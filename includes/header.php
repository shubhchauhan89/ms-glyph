<?php
include 'admin/includes/conn.php';
include 'admin/includes/db.php';

// Check if the database connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the database selection is successful
if (!mysqli_select_db($con, $dbname)) {
    die("Failed to select database: " . mysqli_error($con));
}

$settings = mysqli_query($con, "SELECT * FROM settings WHERE id='1'");
$row = mysqli_fetch_array($settings);

// Function to get the page name from the URL
function getPageName() {
    return basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}

// Get the current page name
$pageName = getPageName();

// Parse the URL to get the path
$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);

// Explode the path by '/' to get individual segments
$segments = explode('/', trim($path, '/'));

// Initialize categoryTitle
$categoryTitle = "";

// Check if the URL contains specific segments and retrieve the category name
$currentCategorySegment = "";
$categorySlug = "";

$categorySegments = ['blog-category', 'product-category', 'service-category'];
foreach ($categorySegments as $categorySegment) {
    if (in_array($categorySegment, $segments)) {
        $key = array_search($categorySegment, $segments);
        if (isset($segments[$key + 1])) {
            $currentCategorySegment = $categorySegment;
            $categorySlug = $segments[$key + 1];
            $categoryTitle = ucwords(str_replace('-', ' ', $categorySlug));
            break;
        }
    }
}
// // Function to set title based on page name
// function getPageTitle($pageName, $categoryTitle) {
    
//     switch ($pageName) {
//         case ($domain):
//             return "Home";
//         case "index.php":
//             return "Home";
//         case "about.php":
//             return "About Us";
//         case "service.php":
//             return "Our Services";
//         case "blog.php":
//             return "Blog";
//         case "pricing.php":
//             return "Pricing";
//         case "portfolio.php":
//             return "Portfolio";
//         case "contact.php":
//             return "Contact Us";
//             default:
//             return $categoryTitle ? $categoryTitle : "Page Not Found";
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="MS Glyph">
    <meta name="description"
        content="MS Glyph is a premier digital agency providing high-ticket design, technical SEO, and global content solutions. Precision-driven execution for consultants and brands.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $domain . $pageName; ?>">
    <meta property="og:title" content="MS Glyph - Precision in Every Pixel.">
    <meta property="og:description"
        content="Technical architecture meets creative power. Discover our integrated SEO, design, and translation solutions.">
    <meta property="og:image" content="assets/img/logo/og-image.jpg">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $domain . $pageName; ?>">
    <meta name="twitter:title" content="MS Glyph - Precision in Every Pixel.">
    <meta name="twitter:description"
        content="Technical architecture meets creative power. Discover our integrated SEO, design, and translation solutions.">
    <meta name="twitter:image" content="assets/img/logo/og-image.jpg">

<?php 
    // 1. DYNAMIC CATEGORY HANDLING
    if (!empty($currentCategorySegment)) { 
        if ($currentCategorySegment === 'blog-category') { ?>
            <title><?php echo $categoryTitle; ?> Articles & Insights | IBP Web Tech</title>
            <meta name="keywords" content="<?php echo strtolower($categoryTitle); ?>, blog, digital marketing updates, tech tips">
            <meta name="description" content="Explore our professional guides, case studies, and strategic trends covering <?php echo $categoryTitle; ?> to grow your business online.">
            <link rel="canonical" href="<?php echo $domain . 'blog-category/' . $categorySlug; ?>" />

        <?php } elseif ($currentCategorySegment === 'service-category') { ?>
            <title>Professional <?php echo $categoryTitle; ?> Services India | IBP Web Tech</title>
            <meta name="keywords" content="<?php echo strtolower($categoryTitle); ?> services, specialized web solutions, custom deployment">
            <meta name="description" content="Scale your enterprise architecture with our customized <?php echo $categoryTitle; ?> solutions. Built for maximum security, speed, and conversion efficiency.">
            <link rel="canonical" href="<?php echo $domain . 'service-category/' . $categorySlug; ?>" />

        <?php } elseif ($currentCategorySegment === 'product-category') { ?>
            <title>Premium <?php echo $categoryTitle; ?> Layouts & Digital Assets</title>
            <meta name="keywords" content="buy <?php echo strtolower($categoryTitle); ?>, commercial digital templates, web layouts">
            <meta name="description" content="Browse ready-to-deploy development structures matching <?php echo $categoryTitle; ?> configurations. Built to industry-best design standards.">
            <link rel="canonical" href="<?php echo $domain . 'product-category/' . $categorySlug; ?>" />
        <?php } 

    // 2. STANDARD PAGE HANDLING
    } else {

        if ($pageName === "index.php" || $pageName === "") { ?>
            <title>Best Website Designing & SEO Company in Indirapuram Ghaziabad | <?php echo htmlspecialchars($row["site_name"]); ?></title>
            <meta name="keywords" content="website design company indirapuram ghaziabad, website design agency indirapuram ghaziabad, best seo services company in indirapuram, web development ghaziabad">
            <meta name="description" content="MS Glyph is a premier digital agency providing high-ticket design, technical SEO, and global content solutions. Precision-driven execution for consultants and brands.">
            <link rel="canonical" href="<?php echo $domain; ?>index.php" />
        
        <?php } elseif ($pageName === "about.php") { ?>
            <title>About Us | Professional Web Design & SEO Experts Ghaziabad</title>
            <meta name="keywords" content="about ibp web tech, website designing agency ghaziabad, professional web developers indirapuram, seo experts delhi ncr">
            <meta name="description" content="Learn about IBP Web Tech, our mission, and our expert team. We are a dedicated digital agency helping businesses scale through custom web development and result-driven SEO.">
            <link rel="canonical" href="<?php echo $domain; ?>about.php" />
        
        <?php } elseif ($pageName === "service.php") { ?>
            <title>Custom Web Development & Professional SEO Services India</title>
            <meta name="keywords" content="web development services india, corporate website design, professional seo packages, ecommerce website design ghaziabad">
            <meta name="description" content="Explore our premium web solutions. From responsive business website design and e-commerce development to data-driven SEO strategies that maximize your ROI.">
            <link rel="canonical" href="<?php echo $domain; ?>service.php" />
        
        <?php } elseif ($pageName === "blog.php") { ?>
            <title>Web Design, SEO & Tech Insights Blog | IBP Web Tech</title>
            <meta name="keywords" content="web design blog, latest seo tips, digital marketing insights, business website strategies">
            <meta name="description" content="Stay updated with the IBP Web Tech blog. Read expert tips, tutorials, and insights on web development, search engine optimization, and online business growth.">
            <link rel="canonical" href="<?php echo $domain; ?>blog.php" />
        
        <?php } elseif ($pageName === "shop.php") { ?>
            <title>Ready-Made Website Templates & Digital Solutions</title>
            <meta name="keywords" content="buy website templates, premium web layouts, ready-made business websites, digital assets for business">
            <meta name="description" content="Browse our collection of conversion-optimized website templates and pre-built digital solutions designed to launch your business online instantly.">
            <link rel="canonical" href="<?php echo $domain; ?>shop.php" />
        
        <?php } elseif ($pageName === "pricing.php") { ?>
            <title>Affordable Web Design & SEO Packages | Transparent Pricing</title>
            <meta name="keywords" content="website design cost ghaziabad, seo package pricing, web development packages india, affordable digital marketing plans">
            <meta name="description" content="Check out our budget-friendly web design and SEO packages. Clear, transparent pricing models built to scale small businesses and corporate enterprises.">
            <link rel="canonical" href="<?php echo $domain; ?>pricing.php" />
        
        <?php } elseif ($pageName === "portfolio.php") { ?>
            <title>Our Work | Web Development & SEO Case Studies</title>
            <meta name="keywords" content="web design portfolio, live website examples, seo success stories, client case studies ibp web tech">
            <meta name="description" content="Explore our portfolio of successful projects. See how we have helped companies across India achieve stunning web architecture and top-tier search engine rankings.">
            <link rel="canonical" href="<?php echo $domain; ?>portfolio.php" />
        
        <?php } elseif ($pageName === "contact.php") { ?>
            <title>Contact IBP Web Tech | Get a Free Website & SEO Consultation</title>
            <meta name="keywords" content="contact web design company ghaziabad, hire seo agency indirapuram, web development quote, digital marketing consultation">
            <meta name="description" content="Ready to transform your digital presence? Contact IBP Web Tech today for a free website audit or SEO consultation. Let's scale your business together.">
            <link rel="canonical" href="<?php echo $domain; ?>contact.php" />
        <?php } 
    } 
?>

    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="assets/img/logo/favicon.svg">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!--<< Color.css >>-->
    <link rel="stylesheet" href="assets/css/color.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                <span data-text-preloader="G" class="letters-loading">
                    G
                </span>
                <span data-text-preloader="L" class="letters-loading">
                    L
                </span>
                <span data-text-preloader="Y" class="letters-loading">
                    Y
                </span>
                <span data-text-preloader="P" class="letters-loading">
                    P
                </span>
                <span data-text-preloader="H" class="letters-loading">
                    H
                </span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back To Top Start -->
    <button id="back-top" class="back-to-top">
        <i class="fa-regular fa-arrow-up"></i>
    </button>

    <!--<< Mouse Cursor Start >>-->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- Offcanvas Area Start -->
    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="index.php">
                                <img src="assets/img/logo/black-logo.svg" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-xl-block">
                        Whether you need a high-end design, a technical SEO overhaul, or global content scaling, we are
                        ready to execute.
                    </p>
                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">
                        <span>Get in Touch</span>
                        <h4>Ready to Blueprint Your Success?</h4>
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#"><?php echo htmlspecialchars($site_address); ?></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="mailto:<?php echo htmlspecialchars($site_email); ?>"><span
                                            class="mailto:<?php echo htmlspecialchars($site_email); ?>"><?php echo htmlspecialchars($site_email); ?></span></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">Mod-friday, 09am -05pm</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+910000000000">+91-000-0000000</a>
                                </div>
                            </li>
                        </ul>
                        <div class="header-button mt-4">

                        </div>
                        <div class="main-button">
                            <a href="contact.php"> <span class="theme-btn"> Get Started </span><span
                                    class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                        </div>
                        <div class="social-icon d-flex align-items-center">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <!-- Header Section Start -->
    <header id="header-sticky" class="header-1 style-2">
        <div class="container-fluid">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="logo">
                        <a href="index.php" class="header-logo-3">
                            <img src="assets/img/logo/black-logo.svg" alt="logo-img">
                        </a>
                    </div>
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="index.php">
                                            Home
                                        </a>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="service.php">
                                            Services
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </a>
                                        <ul class="submenu">
                                            <li><a href="service-details.php">Branding & Identity</a></li>
                                            <li><a href="service-details.php">Digital Design & UI Graphics</a></li>
                                            <li><a href="service-details.php">Social Media & Ad Creatives</a></li>
                                            <li><a href="service-details.php">Print & Packaging Design</a></li>
                                            <li><a href="service-details.php">Presentation & Educational Slides</a></li>
                                            <li><a href="service-details.php">Translation & Editorial Workflows</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="project.php">Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="news.php">News & Insights</a>
                                    </li>
                                    <li>
                                        <a href="about.php">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <div class="main-button">
                            <a href="contact.php"> <span class="theme-btn"> Get a Quote </span><span
                                    class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                        </div>
                        <div class="header__hamburger d-xl-none my-auto">
                            <div class="sidebar__toggle">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>