<?php
include 'admin/includes/conn.php';
include 'admin/includes/db.php';
// Check if 'url' is set in $_GET array
if (isset($_GET['url'])) {
    //fetch products 
    $stmt = $con->prepare("SELECT * FROM blog WHERE url=?");
    $stmt->bind_param("s", $_GET['url']);
    $stmt->execute();
    $product = $stmt->get_result();
    $fetch = mysqli_fetch_array($product);
    
    $raw_desc = !empty($fetch['blog_meta_desc']) ? $fetch['blog_meta_desc'] : '';
        $clean_desc = trim(strip_tags(html_entity_decode($raw_desc, ENT_QUOTES, 'UTF-8')));
        
        if (strlen($clean_desc) > 160) {
            $clean_desc = substr($clean_desc, 0, 152) . '...';
        }
} else {
    $fetch = array(); // Define an empty array to avoid "undefined index" error
}
$settings = mysqli_query($con, "SELECT * FROM settings where id='1'");
$row = mysqli_fetch_array($settings);

$canonical_url = $domain . "blog/" . $fetch['url']; 
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
    <meta property="og:title" content="MS Glyph - Precision in Every Pixel.">
    <meta property="og:description"
        content="Technical architecture meets creative power. Discover our integrated SEO, design, and translation solutions.">
    <meta property="og:image" content="<?php echo $domain; ?>assets/img/logo/og-image.jpg">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="MS Glyph - Precision in Every Pixel.">
    <meta name="twitter:description"
        content="Technical architecture meets creative power. Discover our integrated SEO, design, and translation solutions.">
    <meta name="twitter:image" content="<?php echo $domain; ?>assets/img/logo/og-image.jpg">

    <!-- ======== Page title ============ -->
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) . " | " . htmlspecialchars($site_name) : htmlspecialchars($site_name) . " | Precision Digital Agency"; ?></title>
    <meta name="keywords" content="<?php echo isset($fetch['blog_meta_title']) ? htmlspecialchars($fetch['blog_meta_title']) : ''; ?>">
    <meta name="description" content="<?php echo isset($clean_desc) ? htmlspecialchars($clean_desc) : ''; ?>">
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="<?php echo $domain; ?>assets/img/logo/favicon.svg">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="<?php echo $domain; ?>assets/css/bootstrap.min.css">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="<?php echo $domain; ?>assets/css/all.min.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="<?php echo $domain; ?>assets/css/animate.css">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="<?php echo $domain; ?>assets/css/icomoon.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="<?php echo $domain; ?>assets/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="<?php echo $domain; ?>assets/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="<?php echo $domain; ?>assets/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="<?php echo $domain; ?>assets/css/nice-select.css">
    <!--<< Color.css >>-->
    <link rel="stylesheet" href="<?php echo $domain; ?>assets/css/color.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="<?php echo $domain; ?>assets/css/main.css">
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
                                <img src="<?php echo $domain; ?>assets/img/logo/black-logo.svg" alt="logo-img">
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
                            <img src="<?php echo $domain; ?>assets/img/logo/black-logo.svg" alt="logo-img">
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
                                            <li><a href="service-details.php">Digital & UI/UX Design</a></li>
                                            <li><a href="service-details.php">Social Media & Ad Creatives</a></li>
                                            <li><a href="service-details.php">Print & Marketing Materials</a></li>
                                            <li><a href="service-details.php">Presentation & Educational</a></li>
                                            <li><a href="service-details.php">Technical SEO & Web Dev</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="project.php">Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="blog.php">News & Insights</a>
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