<?php 
include_once 'includes/db.php';
include_once 'includes/conn.php';
include_once 'includes/config.php';
include './includes/blog-header.php';
// Fetch product details safely if 'url' is set in $_GET array
if (isset($_GET['url'])) {
    $stmt = $con->prepare("SELECT * FROM blog WHERE url = ? AND status = '0' LIMIT 1");
    $stmt->bind_param("s", $_GET['url']);
    $stmt->execute();
    $blog = $stmt->get_result();
    $fetch = mysqli_fetch_array($blog);
} else {
    $fetch = array(); 
}

// Redirect to blog listing page if no valid dynamic record is found
if (empty($fetch)) {
    header("Location: blog.php");
    exit();
}

// Dynamically override page parameters before header inclusion
$page_title = !empty($fetch['blog_meta_title']) ? $fetch['blog_meta_title'] : htmlspecialchars($fetch['title']);
$meta_description = !empty($fetch['blog_meta_desc']) ? $fetch['blog_meta_desc'] : '';
$meta_keywords = !empty($fetch['blog_meta_keywords']) ? $fetch['blog_meta_keywords'] : '';


// Clean category strings (replaces dashes with spaces)
$old_string = '-';
$new_string = ' ';
$cat_name = isset($fetch['category']) ? $fetch['category'] : 'Creative Insights';
$display_category = str_replace($old_string, $new_string, $cat_name);
?>

<!-- Breadcrumb Section Start -->
<div class="breadcrumb-wrapper bg-cover" style="background-image: url('<?php echo $domain; ?>assets/img/breadcrumb.jpg');">
    <div class="left-shape">
        <img src="<?php echo $domain; ?>assets/img/breadcrumb-shape.png" alt="img">
    </div>
    <div class="right-shape">
        <img src="<?php echo $domain; ?>assets/img/breadcrumb-shape-2.png" alt="img">
    </div>
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s"><?php echo htmlspecialchars($fetch['title']); ?></h1>
            </div>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="index.php">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="blog.php">Blog</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>Details</li>
            </ul>
        </div>
    </div>
</div>

<!-- News Details Section Start -->
<section class="news-details-section section-padding">
    <div class="container">
        <div class="news-details-wrapper">
            <div class="row g-4">
                <!-- Main Content Column -->
                <div class="col-12 col-lg-8">
                    <div class="news-post-details">
                        <div class="single-news-post">
                            <div class="post-featured-thumb">
                                <?php if (!empty($fetch['img'])): ?>
                                    <img src="<?php echo $domain ?>admin/assets/images/blog/<?php echo isset($fetch['img']) ? $fetch['img'] : '' ?>" alt="<?php echo htmlspecialchars($fetch['title']); ?>">
                                <?php else: ?>
                                    <img src="<?php echo $domain; ?>assets/img/news/details-1.jpg" alt="MS Glyph Creative Insights">
                                <?php endif; ?>
                            </div>
                            <div class="post-content">
                                <ul class="post-list d-flex align-items-center">
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        By Admin
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <?php echo htmlspecialchars($fetch['date']); ?>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-tag"></i>
                                        <?php echo htmlspecialchars(ucwords($display_category)); ?>
                                    </li>
                                </ul>
                                
                                <h3><?php echo htmlspecialchars($fetch['title']); ?></h3>
                                
                                <div class="blog-main-description pt-3">
                                    <!-- Dynamic content rendering from database description column -->
                                    <?php echo $fetch['descrip']; ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tags & Sharing Block -->
                        <div class="row tag-share-wrap mt-4 mb-5">
                            <div class="col-lg-8 col-12">
                                <div class="tagcloud"> 
                                    <span>Category:</span>                                  
                                    <a href="service-details.php"><?php echo htmlspecialchars(ucwords($display_category)); ?></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 mt-3 mt-lg-0 text-lg-end">
                                <div class="social-share">
                                    <span class="me-3">Share:</span>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>                                    
                                    <a href="#"><i class="fab fa-youtube"></i></a>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar Column -->
                <div class="col-12 col-lg-4">
                    <div class="main-sidebar sticky-style">
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>Search</h4>
                            </div>
                            <div class="search-widget">
                                <form action="blog.php" method="GET">
                                    <input type="text" name="search" placeholder="Search insights...">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>Studio Pillars</h4>
                            </div>
                            <div class="news-widget-categories">
                                <ul>
                                    <li><a href="service-details.php">Branding & Identity</a></li>
                                    <li><a href="service-details.php">Digital UI Graphics</a></li>
                                    <li><a href="service-details.php">Social Media Creatives</a></li>
                                    <li><a href="service-details.php">Print & Packaging</a></li>
                                    <li><a href="service-details.php">Presentation Systems</a></li>
                                    <li><a href="service-details.php">Translation & Editorial</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h3>Recent Insights</h3>
                            </div>
                            <div class="recent-post-area">
                                <!-- Studio Theme Post 1 -->
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <img src="<?php echo $domain; ?>assets/img/news/pp3.jpg" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <ul>
                                            <li><i class="fa-solid fa-calendar-days"></i> Recent</li>
                                        </ul>
                                        <h6>
                                            <a href="blog.php">Mastering the Art of High-Ticket Brand Architecture</a>
                                        </h6>
                                    </div>
                                </div>
                                <!-- Studio Theme Post 2 -->
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <img src="<?php echo $domain; ?>assets/img/news/pp4.jpg" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <ul>
                                            <li><i class="fa-solid fa-calendar-days"></i> Recent</li>
                                        </ul>
                                        <h6>
                                            <a href="blog.php">Why Localization Fails Without Meticulous Proofreading</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Section -->
<section class="cta-section section-padding pb-0">
    <div class="rokect-shape float-bob-y">
        <img src="<?php echo $domain; ?>assets/img/rokect.png" alt="img">
    </div>
    <div class="container">
        <div class="cta-wrapper bg-cover" style="background-image: url('<?php echo $domain; ?>assets/img/cta-bg.jpg');">
            <div class="cta-img wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                <img src="<?php echo $domain; ?>assets/img/cta-img.png" alt="img">
            </div>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                Transform Your Brand With <br> Precision Design & Copy
            </h2>
            <div class="main-button wow fadeInUp" data-wow-delay=".5s">
                <a href="contact.php"> <span class="theme-btn"> BRIEF OUR STUDIO </span><span class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
            </div>
        </div>
    </div>
</section>

<?php include_once 'includes/footer.php'; ?>