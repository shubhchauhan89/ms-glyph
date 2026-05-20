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
    <meta property="og:image" content="<?php echo $domain; ?>assets/img/logo/og-image.jpg">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $domain . $pageName; ?>">
    <meta name="twitter:title" content="MS Glyph - Precision in Every Pixel.">
    <meta name="twitter:description"
        content="Technical architecture meets creative power. Discover our integrated SEO, design, and translation solutions.">
    <meta name="twitter:image" content="<?php echo $domain; ?>assets/img/logo/og-image.jpg">

<?php 
    // 1. DYNAMIC CATEGORY HANDLING
    if (!empty($currentCategorySegment)) { 
        if ($currentCategorySegment === 'blog-category') { ?>
            <title><?php echo $categoryTitle; ?> Design & Editorial Insights | MS Glyph</title>
            <meta name="keywords" content="<?php echo strtolower($categoryTitle); ?>, graphic design blog, branding strategy, asset localization updates">
            <meta name="description" content="Explore professional visual communication guides, layout composition case studies, and corporate branding trends covering <?php echo $categoryTitle; ?>.">
            <link rel="canonical" href="<?php echo $domain . 'blog-category/' . $categorySlug; ?>" />

        <?php } elseif ($currentCategorySegment === 'service-category') { ?>
            <title>Bespoke <?php echo $categoryTitle; ?> Studio Services | MS Glyph</title>
            <meta name="keywords" content="<?php echo strtolower($categoryTitle); ?> services, premium graphic layouts, high-fidelity visual assets, editorial workflows">
            <meta name="description" content="Elevate your corporate visual positioning with our customized <?php echo $categoryTitle; ?> solutions. Engineered for absolute layout precision and market authority.">
            <link rel="canonical" href="<?php echo $domain . 'service-category/' . $categorySlug; ?>" />

        <?php } elseif ($currentCategorySegment === 'product-category') { ?>
            <title>Premium <?php echo $categoryTitle; ?> Slide Templates & Corporate Design Assets</title>
            <meta name="keywords" content="buy premium <?php echo strtolower($categoryTitle); ?> templates, presentation slide layouts, vector graphics kits">
            <meta name="description" content="Browse our curated catalog of pristine, ready-to-customize presentation layouts and vector design assets matching <?php echo $categoryTitle; ?> configurations.">
            <link rel="canonical" href="<?php echo $domain . 'product-category/' . $categorySlug; ?>" />
        <?php } 

    // 2. STANDARD PAGE HANDLING
    } else {

        if ($pageName === "index.php" || $pageName === "") { ?>
            <title>Premium Graphic Design & Corporate Branding Studio Delhi NCR | <?php echo htmlspecialchars($row["site_name"]); ?></title>
            <meta name="keywords" content="graphic design studio delhi ncr, corporate branding agency, corporate presentation design, product packaging design, professional translation workflows, proofreading services">
            <meta name="description" content="MS Glyph is a premier creative studio delivering bespoke graphic design, identity systems, elite presentation layouts, and flawless localization workflows for global leaders.">
            <link rel="canonical" href="<?php echo $domain; ?>index.php" />
        
        <?php } elseif ($pageName === "about.php") { ?>
            <title>Our Studio | Elite Graphic Design & Editorial Partners Delhi NCR</title>
            <meta name="keywords" content="about ms glyph, professional graphic designers delhi ncr, corporate branding experts, silent execution arm design, typography localization">
            <meta name="description" content="Learn about MS Glyph, our structural design philosophy, and rigorous quality standards. We serve as the definitive silent execution partner for consultants and global brands.">
            <link rel="canonical" href="<?php echo $domain; ?>about.php" />
        
        <?php } elseif ($pageName === "service.php") { ?>
            <title>Bespoke Graphic Design, Corporate Branding & Asset Localization Services</title>
            <meta name="keywords" content="graphic design services, brand identity packages, pitch deck layout design, packaging design studio, corporate document proofreading">
            <meta name="description" content="Explore our elite creative pillars. From signature brand identity guides and digital UI graphics to high-impact educational presentation slides and pristine translation workflows.">
            <link rel="canonical" href="<?php echo $domain; ?>service.php" />
        
        <?php } elseif ($pageName === "blog.php") { ?>
            <title>Creative Strategy, Typographic & Editorial Insights Blog | MS Glyph</title>
            <meta name="keywords" content="graphic design blog, brand identity strategy, presentation layout guides, vector composition tips, translation accuracy insights">
            <meta name="description" content="Stay informed with the MS Glyph blog. Read expert perspectives, case analyses, and tutorials on corporate presentation design, branding aesthetics, and cultural localization.">
            <link rel="canonical" href="<?php echo $domain; ?>blog.php" />
        
        <?php } elseif ($pageName === "shop.php") { ?>
            <title>Premium Presentation Slide Templates & Executive Graphic Assets</title>
            <meta name="keywords" content="buy corporate ppt templates, professional presentation slides, high-end vector kits, school project presentation layout">
            <meta name="description" content="Access our exclusive marketplace of conversion-engineered corporate pitch decks, educational presentation slide layouts, and pristine digital graphic assets.">
            <link rel="canonical" href="<?php echo $domain; ?>shop.php" />
        
        <?php } elseif ($pageName === "pricing.php") { ?>
            <title>Premium Creative Briefs & Studio Retainer Packages | Transparent Pricing</title>
            <meta name="keywords" content="graphic design studio retainer cost, brand identity package pricing delhi ncr, corporate presentation design rates">
            <meta name="description" content="Review transparent project packages and structural monthly studio retainer configurations meticulously tailored for high-ticket consultants and corporate enterprises.">
            <link rel="canonical" href="<?php echo $domain; ?>pricing.php" />
        
        <?php } elseif ($pageName === "portfolio.php") { ?>
            <title>Our Portfolio | Case Studies in Visual Craft & Editorial Precision</title>
            <meta name="keywords" content="graphic design portfolio delhi ncr, brand identity system examples, corporate pitch deck records, professional localization case studies">
            <meta name="description" content="Explore our visual showcase. Discover how MS Glyph has helped elite companies secure absolute aesthetic authority and linguistic clarity across print and digital media.">
            <link rel="canonical" href="<?php echo $domain; ?>portfolio.php" />
        
        <?php } elseif ($pageName === "contact.php") { ?>
            <title>Brief Our Studio | Secure Your Silent Creative Execution Arm</title>
            <meta name="keywords" content="hire graphic design studio delhi ncr, brief ms glyph, corporate design firm quote, request translation services">
            <meta name="description" content="Ready to transform your brand architecture and achieve cross-border linguistic precision? Connect with MS Glyph to brief our creative studio on your next project.">
            <link rel="canonical" href="<?php echo $domain; ?>contact.php" />
        <?php } 
    } 
?>

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