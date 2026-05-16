<?php
include './includes/auth.php';
include './includes/header.php';
include './includes/conn.php';

date_default_timezone_set('Asia/Kolkata');
$today = date("D d M Y");

$result = mysqli_query($con, "SELECT * FROM settings WHERE id='1'");
$row = mysqli_fetch_array($result);
$edit = $row['id'];

// Function to scan directory and exclude specified folders and files
function scanDirectory($dir, $sitemap_domain) {
    $urls = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        // Skip directories and specified file extensions
        if ($file->isDir() || in_array($file->getExtension(), ['html', 'txt', 'xml'])) {
            continue;
        }
        
        $filePath = $file->getPathname();
        $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $filePath);
        
        // Exclude admin, includes, and assets folders
        if (strpos($relativePath, '/admin/') !== false || strpos($relativePath, '/includes/') !== false || strpos($relativePath, 'rrnursing.ibpwebtech.com') !== false || strpos($relativePath, 'ucs.ibpwebtech.com') !== false || strpos($relativePath, '/assets/') !== false) {
            continue;
        }

        // Add frontend URL to sitemap
        $url = $sitemap_domain . $relativePath;
        $urls[] = $url;
    }
    return $urls;
}

// Function to fetch specific URLs from database
function getDatabaseUrls($con, $sitemap_domain) {
    $urls = [];

    // Example: Fetch products URLs
    $productsQuery = mysqli_query($con, "SELECT * FROM product");
    while ($product = mysqli_fetch_assoc($productsQuery)) {
        $url = $sitemap_domain . '/product/' . urlencode($product['url']); // Adjust as per your URL structure
        $urls[] = $url;
    }

    // Example: Fetch services URLs
    $servicesQuery = mysqli_query($con, "SELECT * FROM services");
    while ($service = mysqli_fetch_assoc($servicesQuery)) {
        $url = $sitemap_domain . '/services/' . urlencode($service['url']); // Adjust as per your URL structure
        $urls[] = $url;
    }

    // Example: Fetch blog URLs
    $blogsQuery = mysqli_query($con, "SELECT * FROM blog");
    while ($blog = mysqli_fetch_assoc($blogsQuery)) {
        $url = $sitemap_domain . '/blog/' . urlencode($blog['url']); // Adjust as per your URL structure
        $urls[] = $url;
    }
    
    // Example: Fetch product category URLs
    $productcatQuery = mysqli_query($con, "SELECT * FROM product_cat");
    while ($product = mysqli_fetch_assoc($productcatQuery)) {
        $url = $sitemap_domain . '/product-category/' . urlencode($product['product_cat_url']); // Adjust as per your URL structure
        $urls[] = $url;
    }
    
    // Example: Fetch service category URLs
    $servicecatQuery = mysqli_query($con, "SELECT * FROM services_cat");
    while ($product = mysqli_fetch_assoc($servicecatQuery)) {
        $url = $sitemap_domain . '/service-category/' . urlencode($product['service_cat_url']); // Adjust as per your URL structure
        $urls[] = $url;
    }
    
    // Example: Fetch blog category URLs
    $blogcatQuery = mysqli_query($con, "SELECT * FROM category");
    while ($product = mysqli_fetch_assoc($blogcatQuery)) {
        $url = $sitemap_domain . '/blog-category/' . urlencode($product['cat_url']); // Adjust as per your URL structure
        $urls[] = $url;
    }

    return $urls;
}

// Function to exclude specific URLs from sitemap
function excludeUrls($urls) {
    $excludeUrls = [
        '/product-category.php', 
        '/shop-detail.php', 
        '/blog-category.php', 
        '/service-category.php', 
        '/blog-detail.php', 
        '/product-detail.php', 
        '/service-detail.php',
        '/default.php',
        '/php.ini',
        '.htaccess',
        'mail.php',
        'view_count.txt',
        'error_log',
        '/ibp',
        '/vendor/',                     // Blocks Composer vendor files
        '/node_modules/',               // Blocks Node packages
        '/.git/',                       // Blocks Git files
        '/tests/'
    ];
    return array_filter($urls, function($url) use ($excludeUrls) {
        foreach ($excludeUrls as $exclude) {
            if (strpos($url, $exclude) !== false) {
                return false;
            }
        }
        return true;
    });
}

// Function to generate robots.txt with disallow rule for admin directory
function generateRobotsTxt() {
    $robotsContent = "User-agent: *\nDisallow: /admin/";
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/robots.txt', $robotsContent);
}

if (isset($_POST['add'])) {
    // Your existing form processing code here
}

if (isset($_POST['generate_sitemap'])) {
    $sitemap_domain = $sitemap_domain; // Replace with your actual base URL
    $frontendUrls = scanDirectory($_SERVER['DOCUMENT_ROOT'], $sitemap_domain);
    $databaseUrls = getDatabaseUrls($con, $sitemap_domain);
    $urls = array_merge($frontendUrls, $databaseUrls);

    // Exclude specified URLs
    $urls = excludeUrls($urls);

    // Generate sitemap XML
    $sitemap = new SimpleXMLElement('<urlset/>');
    $sitemap->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

    foreach ($urls as $url) {
        $urlElement = $sitemap->addChild('url');
        $urlElement->addChild('loc', htmlspecialchars($url));
        $urlElement->addChild('lastmod', date('c', time())); // Modify based on last modification time of the URL
        $urlElement->addChild('changefreq', 'weekly'); // Adjust change frequency if necessary
        $urlElement->addChild('priority', '0.5'); // Adjust priority if necessary
    }

    $sitemapPath = '../sitemap.xml'; // Change this path as needed
    file_put_contents($sitemapPath, $sitemap->asXML());

    echo "<script>alert('Sitemap generated successfully.');</script>";
    echo "<script>window.location.href = 'setting.php'</script>";

    // Generate robots.txt
    generateRobotsTxt();
}

if (isset($_POST['add'])) {
    $site_name = $_POST['site_name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $footer_desc = $_POST['footer_desc'] ?? '';
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $country = $_POST['country'] ?? '';
    $pin = $_POST['pin'] ?? '';
    $facebook = $_POST['facebook'] ?? '';
    $twitter = $_POST['twitter'] ?? '';
    $linkedin = $_POST['linkedin'] ?? '';
    $instagram = $_POST['instagram'] ?? '';
    $youtube = $_POST['youtube'] ?? '';
    $map = $_POST['map'] ?? '';

    // Upload header logo
    if ($_FILES['header_logo']['name'] != '') {
        $header_logo = rand() . $_FILES['header_logo']['name'];
        $tempname_header = $_FILES['header_logo']['tmp_name'];
        $folder_header = "assets/images/" . $header_logo;
        move_uploaded_file($tempname_header, $folder_header);
    } else {
        $header_logo = $row["header_logo"];
    }

    // Upload footer logo
    if ($_FILES['footer_logo']['name'] != '') {
        $footer_logo = rand() . $_FILES['footer_logo']['name'];
        $tempname_footer = $_FILES['footer_logo']['tmp_name'];
        $folder_footer = "assets/images/" . $footer_logo;
        move_uploaded_file($tempname_footer, $folder_footer);
    } else {
        $footer_logo = $row["footer_logo"];
    }

    // Upload favicon logo
    if ($_FILES['favicon_logo']['name'] != '') {
        $favicon_logo = rand() . $_FILES['favicon_logo']['name'];
        $tempname_favicon = $_FILES['favicon_logo']['tmp_name'];
        $folder_favicon = "assets/images/" . $favicon_logo;
        move_uploaded_file($tempname_favicon, $folder_favicon);
    } else {
        $favicon_logo = $row["favicon_logo"];
    }

    if ($edit == '') {
        $stmt = $con->prepare("INSERT INTO settings (site_name, phone, email, footer_desc, address, city, state, country, pin, header_logo, favicon_logo, footer_logo, facebook, twitter, linkedin, instagram, youtube, map) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssssss", $site_name, $phone, $email, $footer_desc, $address, $city, $state, $country, $pin, $header_logo, $favicon_logo, $footer_logo, $facebook, $twitter, $linkedin, $instagram, $youtube, $map);
        $stmt->execute();

        echo "<script>alert('Posted Successfully');</script>";
        echo "<script>window.location.href = 'setting.php'</script>";
    } else {
        $stmt = $con->prepare("UPDATE settings SET site_name=?, phone=?, email=?, footer_desc=?, address=?, city=?, state=?, country=?, pin=?, header_logo=?, favicon_logo=?, footer_logo=?, facebook=?, twitter=?, linkedin=?, instagram=?, youtube=?, map=? WHERE id=?");
        $stmt->bind_param("ssssssssssssssssssi", $site_name, $phone, $email, $footer_desc, $address, $city, $state, $country, $pin, $header_logo, $favicon_logo, $footer_logo, $facebook, $twitter, $linkedin, $instagram, $youtube, $map, $edit);
        $stmt->execute();

        echo "<script>alert('Updated Successfully');</script>";
        echo "<script>window.location.href = 'setting.php'</script>";
    }
}
?>

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h5 class="mt-0">Settings</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row form-material">
                                <div class="col-md-6">
                                    <h6 class="input-title mt-4">Sitemap</h6>
                                    <button type="submit" name="generate_sitemap" class="btn btn-info waves-effect waves-light">Generate Sitemap</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row form-material">
                                <div class="col-md-6">
                                    <h6 class="input-title mt-4">Site Title</h6>
                                    <input type="text" name="site_name" value="<?php echo htmlspecialchars($row["site_name"]); ?>" class="form-control" placeholder="Enter title" id="mdate">
                                    <h6 class="input-title mt-4">Phone Number</h6>
                                    <input type="text" name="phone" value="<?php echo htmlspecialchars($row["phone"]); ?>" id="date-format" class="form-control" placeholder="Enter Phone number">
                                    <h6 class="input-title mt-4">Phone Number 2</h6>
                                    <input type="text" name="phone2" value="<?php echo htmlspecialchars($row["phone2"]); ?>" id="date-format" class="form-control" placeholder="Enter Phone number">
                                    <h6 class="input-title mt-4">Address</h6>
                                    <input type="text" name="address" value="<?php echo htmlspecialchars($row["address"]); ?>" id="date-format" class="form-control" placeholder="Enter address">
                                    <h6 class="input-title mt-4">Email</h6>
                                    <input type="text" name="email" value="<?php echo htmlspecialchars($row["email"]); ?>" id="date-format" class="form-control" placeholder="Enter email">
                                    <h6 class="input-title mt-4">Map</h6>
                                    <input type="text" name="map" value="<?php echo htmlspecialchars($row["map"]); ?>" id="date-format" class="form-control" placeholder="Enter map location">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="input-title mt-4">Facebook</h6>
                                    <input type="text" name="facebook" value="<?php echo htmlspecialchars($row["facebook"]); ?>" class="form-control" placeholder="Enter url" id="mdate">
                                    <h6 class="input-title mt-4">Instagram</h6>
                                    <input type="text" name="instagram" value="<?php echo htmlspecialchars($row["instagram"]); ?>" class="form-control" placeholder="Enter url" id="mdate">
                                    <h6 class="input-title mt-4">Twitter</h6>
                                    <input type="text" name="twitter" value="<?php echo htmlspecialchars($row["twitter"]); ?>" class="form-control" placeholder="Enter url" id="mdate">
                                    <h6 class="input-title mt-4">Linkedin</h6>
                                    <input type="text" name="linkedin" value="<?php echo htmlspecialchars($row["linkedin"]); ?>" class="form-control" placeholder="Enter url" id="mdate">
                                    <h6 class="input-title mt-4">Youtube</h6>
                                    <input type="text" name="youtube" value="<?php echo htmlspecialchars($row["youtube"]); ?>" class="form-control" placeholder="Enter url" id="mdate">
                                </div>
                                <div class="card-body">
                                    <p>Upload Logo</p>
                                    <input type="file" name="header_logo" id="input-file-now" class="dropify">
                                    <img src="<?php echo $domain; ?>admin/assets/images/<?php echo $row["header_logo"]; ?>" width="100px">
                                </div>
                                <div class="card-body">
                                    <p>Upload Footer Logo</p>
                                    <input type="file" name="footer_logo" id="input-file-now" class="dropify">
                                    <img src="<?php echo $domain; ?>admin/assets/images/<?php echo $row["footer_logo"]; ?>" width="100px">
                                </div>
                                <div class="card-body">
                                    <p>Upload Favicon Logo</p>
                                    <input type="file" name="favicon_logo" id="input-file-now" class="dropify">
                                    <img src="<?php echo $domain; ?>admin/assets/images/<?php echo $row["favicon_logo"]; ?>" width="100px">
                                </div>
                            </div>
                            <div class="button-items">
                                <button type="submit" name="add" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './includes/footer.php'; ?>
</div>
