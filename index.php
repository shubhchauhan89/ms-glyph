<?php
include_once 'includes/db.php';
include_once 'includes/config.php';
$page_title = 'Home';
include_once 'includes/header.php';
?>

    <!-- Hero Section Start -->
    <section class="hero-section hero-3" style="background-image: url('assets/img/hero/hero-bg-3.jpg');">
        <div class="line-shape">
            <img src="assets/img/hero/line-shape.png" alt="img">
        </div>
        <div class="container-fluid">
            <div class="row g-4 justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h6 class="wow fadeInUp">MS Glyph Digital Agency</h6>
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">
                            Precision in Every <span>Pixel.</span>Power in Every Word.
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".5s">
                            Providing precision-driven digital solutions for leaders across Delhi NCR. We turn your
                            brand's vision into a precisely executed digital reality.
                        </p>
                        <div class="hero-button">
                            <div class="main-button wow fadeInUp" data-wow-delay=".3s">
                                <a href="service.php"> <span class="theme-btn">View Our Services </span><span
                                        class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                            </div>
                            <a href="contact.php" class="link-btn wow fadeInUp" data-wow-delay=".5s">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                        <img src="assets/img/hero/hero-image-3.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Section Start -->
    <section class="service-section fix section-padding">
        <div class="bg-shape-2">
            <img src="assets/img/service/bg-shape-2.png" alt="img">
        </div>
        <div class="right-shape-3">
            <img src="assets/img/service/right-shape-3.png" alt="img">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <div class="sub-title bg-color-2 wow fadeInUp">
                    <span>Our Creative & Technical Scope</span>
                </div>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Precision-Driven Solutions <br> for Every Need
                </h2>
            </div>
            <div class="row">
                <?php
                // MS Glyph Silent Execution Fallback - Services
                $services_list = [
                    ['title' => 'Branding & Visual Identity', 'category_list' => 'Logo Design, Brand Identity, Business Cards, Letterheads, and comprehensive Brand Guidelines.', 'icon_class' => '01.png', 'slug' => 'branding-identity'],
                    ['title' => 'Digital & UI/UX Design', 'category_list' => 'Website Banners, Landing Pages, App UI, Email Templates, and custom Web Graphics.', 'icon_class' => '05.png', 'slug' => 'digital-ui-ux-design'],
                    ['title' => 'Social Media & Ad Creatives', 'category_list' => 'Instagram Posts, Facebook Ads, YouTube Thumbnails, Story & Reel Covers, and Social Media Banners.', 'icon_class' => '06.png', 'slug' => 'social-media-ad-creatives'],
                    ['title' => 'Print & Marketing Materials', 'category_list' => 'Posters, Flyers, Brochures, Menu Cards, Packaging Design, Product Catalogs, and Infographics.', 'icon_class' => '01.png', 'slug' => 'print-marketing-materials'],
                    ['title' => 'Presentation & Educational Design', 'category_list' => 'Specialized PPT Design for School Projects, Coaching Center slides, and Corporate Presentations.', 'icon_class' => '05.png', 'slug' => 'presentation-educational-design'],
                    ['title' => 'Technical SEO & Development', 'category_list' => 'Comprehensive SEO services and Website Designing focused on speed, authority, and ranking.', 'icon_class' => '06.png', 'slug' => 'technical-seo-web-dev']
                ];

                if (isset($agency_blueprint_conn) && $agency_blueprint_conn !== null) {
                    try {
                        $stmt = $agency_blueprint_conn->query("SELECT * FROM services ORDER BY id ASC LIMIT 6");
                        if ($stmt->rowCount() > 0) {
                            $services_list = $stmt->fetchAll();
                        }
                    } catch (PDOException $e) {
                        // Silent fail
                    }
                }

                $index = 0;
                foreach ($services_list as $srv) {
                    $title = htmlspecialchars($srv['title']);
                    $desc = htmlspecialchars($srv['category_list'] ?? $srv['description']);
                    $icon = htmlspecialchars($srv['icon_class']);
                    $slug = htmlspecialchars($srv['slug']);
                    $delay = 0.3 + (($index % 3) * 0.2);
                ?>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".<?php echo $delay * 10; ?>s">
                    <div class="service-card-items style-2">
                        <div class="service-thumb">
                            <img src="assets/img/service/<?php echo $icon; ?>" alt="img">
                        </div>
                        <div class="content">
                            <h3 class="title-2">
                                <a href="service-details.php?s=<?php echo $slug; ?>"><?php echo $title; ?></a>
                            </h3>
                            <p><?php echo $desc; ?></p>
                            <a href="service-details.php?s=<?php echo $slug; ?>" class="service-btn">Read more <i class="fa-solid fa-chevrons-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php 
                    $index++;
                } 
                ?>
            </div>
        </div>
    </section>

    <!-- Working Process Section Start -->
    <section class="team-section fix section-padding bg-cover"
        style="background-image: url('assets/img/team/team-bg.jpg');">
        <div class="shape-img float-bob-y">
            <img src="assets/img/service/rocket-shape.png" alt="img">
        </div>
        <div class="container">
            <div class="team-wrapper style-3">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="team-image-2">
                            <img src="assets/img/team/02.png" alt="img" class="wow img-custom-anim-left"
                                data-wow-duration="1.5s" data-wow-delay="0.3s">
                            <div class="client-shape float-bob-x">
                                <img src="assets/img/team/client-shape.png" alt="img">
                            </div>
                            <div class="box-shape float-bob-y">
                                <img src="assets/img/team/box-shape.png" alt="img">
                            </div>
                            <a href="team.php" class="circle-button">
                                <i class="fa-regular fa-arrow-up-right"></i>
                                <span class="text-circle">
                                    <img src="assets/img/about/white-text.png" alt="img">
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-content">
                            <div class="section-title">
                                <div class="sub-title bg-color-2 wow fadeInUp">
                                    <span>Our Method</span>
                                </div>
                                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                    The Path to Precision
                                </h2>
                            </div>
                            <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                From the first discovery call to final delivery, every project follows our proven
                                four-step framework designed to maximize precision and impact.
                            </p>
                            <div class="list-items wow fadeInUp" data-wow-delay=".3s">
                                <ul>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M7.38397 14.1797C7.34153 14.1797 7.29954 14.171 7.26066 14.1539C7.22178 14.1369 7.18683 14.1121 7.15803 14.0809L1.06612 7.49119C1.02551 7.44726 0.99859 7.39244 0.988651 7.33344C0.978712 7.27445 0.986187 7.21384 1.01016 7.15902C1.03414 7.10421 1.07357 7.05758 1.12364 7.02483C1.17371 6.99208 1.23223 6.97464 1.29206 6.97464H4.22437C4.26839 6.97464 4.31191 6.98409 4.35197 7.00234C4.39204 7.0206 4.42772 7.04723 4.45661 7.08045L6.49255 9.42273C6.71258 8.95239 7.13852 8.16925 7.88597 7.21497C8.99095 5.8042 11.0463 3.7294 14.5627 1.85642C14.6307 1.82023 14.7097 1.81083 14.7843 1.83009C14.8588 1.84936 14.9235 1.89587 14.9654 1.96046C15.0073 2.02504 15.0235 2.103 15.0108 2.17894C14.998 2.25488 14.9573 2.32328 14.8966 2.37064C14.8831 2.38113 13.5273 3.44882 11.967 5.40448C10.5309 7.20417 8.62191 10.1469 7.68255 13.946C7.66605 14.0128 7.62767 14.0721 7.57354 14.1144C7.5194 14.1568 7.45263 14.1799 7.38388 14.1799L7.38397 14.1797Z"
                                                fill="#9B7EBD" />
                                        </svg>
                                        Step 01: Deep Discovery
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M7.38397 14.1797C7.34153 14.1797 7.29954 14.171 7.26066 14.1539C7.22178 14.1369 7.18683 14.1121 7.15803 14.0809L1.06612 7.49119C1.02551 7.44726 0.99859 7.39244 0.988651 7.33344C0.978712 7.27445 0.986187 7.21384 1.01016 7.15902C1.03414 7.10421 1.07357 7.05758 1.12364 7.02483C1.17371 6.99208 1.23223 6.97464 1.29206 6.97464H4.22437C4.26839 6.97464 4.31191 6.98409 4.35197 7.00234C4.39204 7.0206 4.42772 7.04723 4.45661 7.08045L6.49255 9.42273C6.71258 8.95239 7.13852 8.16925 7.88597 7.21497C8.99095 5.8042 11.0463 3.7294 14.5627 1.85642C14.6307 1.82023 14.7097 1.81083 14.7843 1.83009C14.8588 1.84936 14.9235 1.89587 14.9654 1.96046C15.0073 2.02504 15.0235 2.103 15.0108 2.17894C14.998 2.25488 14.9573 2.32328 14.8966 2.37064C14.8831 2.38113 13.5273 3.44882 11.967 5.40448C10.5309 7.20417 8.62191 10.1469 7.68255 13.946C7.66605 14.0128 7.62767 14.0721 7.57354 14.1144C7.5194 14.1568 7.45263 14.1799 7.38388 14.1799L7.38397 14.1797Z"
                                                fill="#9B7EBD" />
                                        </svg>
                                        Step 02: Strategic Architecture
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M7.38397 14.1797C7.34153 14.1797 7.29954 14.171 7.26066 14.1539C7.22178 14.1369 7.18683 14.1121 7.15803 14.0809L1.06612 7.49119C1.02551 7.44726 0.99859 7.39244 0.988651 7.33344C0.978712 7.27445 0.986187 7.21384 1.01016 7.15902C1.03414 7.10421 1.07357 7.05758 1.12364 7.02483C1.17371 6.99208 1.23223 6.97464 1.29206 6.97464H4.22437C4.26839 6.97464 4.31191 6.98409 4.35197 7.00234C4.39204 7.0206 4.42772 7.04723 4.45661 7.08045L6.49255 9.42273C6.71258 8.95239 7.13852 8.16925 7.88597 7.21497C8.99095 5.8042 11.0463 3.7294 14.5627 1.85642C14.6307 1.82023 14.7097 1.81083 14.7843 1.83009C14.8588 1.84936 14.9235 1.89587 14.9654 1.96046C15.0073 2.02504 15.0235 2.103 15.0108 2.17894C14.998 2.25488 14.9573 2.32328 14.8966 2.37064C14.8831 2.38113 13.5273 3.44882 11.967 5.40448C10.5309 7.20417 8.62191 10.1469 7.68255 13.946C7.66605 14.0128 7.62767 14.0721 7.57354 14.1144C7.5194 14.1568 7.45263 14.1799 7.38388 14.1799L7.38397 14.1797Z"
                                                fill="#9B7EBD" />
                                        </svg>
                                        Step 03: Precise Execution
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M7.38397 14.1797C7.34153 14.1797 7.29954 14.171 7.26066 14.1539C7.22178 14.1369 7.18683 14.1121 7.15803 14.0809L1.06612 7.49119C1.02551 7.44726 0.99859 7.39244 0.988651 7.33344C0.978712 7.27445 0.986187 7.21384 1.01016 7.15902C1.03414 7.10421 1.07357 7.05758 1.12364 7.02483C1.17371 6.99208 1.23223 6.97464 1.29206 6.97464H4.22437C4.26839 6.97464 4.31191 6.98409 4.35197 7.00234C4.39204 7.0206 4.42772 7.04723 4.45661 7.08045L6.49255 9.42273C6.71258 8.95239 7.13852 8.16925 7.88597 7.21497C8.99095 5.8042 11.0463 3.7294 14.5627 1.85642C14.6307 1.82023 14.7097 1.81083 14.7843 1.83009C14.8588 1.84936 14.9235 1.89587 14.9654 1.96046C15.0073 2.02504 15.0235 2.103 15.0108 2.17894C14.998 2.25488 14.9573 2.32328 14.8966 2.37064C14.8831 2.38113 13.5273 3.44882 11.967 5.40448C10.5309 7.20417 8.62191 10.1469 7.68255 13.946C7.66605 14.0128 7.62767 14.0721 7.57354 14.1144C7.5194 14.1568 7.45263 14.1799 7.38388 14.1799L7.38397 14.1797Z"
                                                fill="#9B7EBD" />
                                        </svg>
                                        Step 04: Quality Optimization
                                    </li>
                                </ul>
                            </div>
                            <div class="main-button wow fadeInUp" data-wow-delay=".5s">
                                <a href="team.php"> <span class="theme-btn"> EXPLORE MORE </span><span
                                        class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marque Section Start -->
    <div class="marquee-section-1 marquee-2">
        <!-- Marquee 1: Focus on Services & Scope -->
        <div class="mycustom-marque style-2 bg-2">
            <div class="scrolling-wrap">
                <div class="comm">
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">PRECISE WEB DESIGN</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">HIGH-TICKET SEO</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">BRAND ARCHITECTURE</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">GLOBAL TRANSLATION</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">VISUAL PSYCHOLOGY</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">PRECISE WEB DESIGN</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">HIGH-TICKET SEO</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">BRAND ARCHITECTURE</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">GLOBAL TRANSLATION</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">VISUAL PSYCHOLOGY</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">PRECISE WEB DESIGN</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">HIGH-TICKET SEO</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">BRAND ARCHITECTURE</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">GLOBAL TRANSLATION</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">VISUAL PSYCHOLOGY</div>
                </div>
            </div>
        </div>

        <!-- Marquee 2: Focus on Brand Identity & Geography -->
        <div class="mycustom-marque style-3 bg-3">
            <div class="scrolling-wrap">
                <div class="comm">
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">MS GLYPH</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">DELHI NCR POWER</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">SILENT EXECUTION ARM</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">PRECISION IN PIXELS</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">POWER IN WORDS</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">MS GLYPH</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">DELHI NCR POWER</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">SILENT EXECUTION ARM</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">PRECISION IN PIXELS</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">POWER IN WORDS</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">MS GLYPH</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">DELHI NCR POWER</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">SILENT EXECUTION ARM</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">PRECISION IN PIXELS</div>
                    <div class="cmn-textslide"><img src="assets/img/star-2.png" alt="img">POWER IN WORDS</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Case Studies Section Start -->
    <section class="case-studies-section-3 fix section-padding">
        <div class="container">
            <div class="section-title text-center">
                <div class="sub-title wow fadeInUp">
                    <span>Our Work</span>
                </div>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Precision in Action
                </h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="swiper project-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="case-studies-card-items">
                            <div class="thumb">
                                <img src="assets/img/case-studies/02.jpg" alt="TechNova Brand Identity">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h3><a href="project-details.php">TechNova Brand Identity</a></h3>
                                    <p>Brand Guidelines & Logo Design</p>
                                </div>
                                <a href="project-details.php" class="icon"><i
                                        class="fa-regular fa-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="case-studies-card-items">
                            <div class="thumb">
                                <img src="assets/img/case-studies/03.jpg" alt="SaaS Hero Landing Page">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h3><a href="project-details.php">SaaS Hero Landing Page</a></h3>
                                    <p>UI/UX & Web Graphics</p>
                                </div>
                                <a href="project-details.php" class="icon"><i
                                        class="fa-regular fa-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="case-studies-card-items">
                            <div class="thumb">
                                <img src="assets/img/case-studies/04.jpg" alt="Medical Coaching Series">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h3><a href="project-details.php">Medical Coaching Series</a></h3>
                                    <p>Specialized PPT Design</p>
                                </div>
                                <a href="project-details.php" class="icon"><i
                                        class="fa-regular fa-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="case-studies-card-items">
                            <div class="thumb">
                                <img src="assets/img/case-studies/02.jpg" alt="Global Product Catalog">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h3><a href="project-details.php">Global Product Catalog</a></h3>
                                    <p>Print Design & Infographics</p>
                                </div>
                                <a href="project-details.php" class="icon"><i
                                        class="fa-regular fa-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="case-studies-card-items">
                            <div class="thumb">
                                <img src="assets/img/case-studies/03.jpg" alt="E-commerce Ad Campaign">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h3><a href="project-details.php">E-commerce Ad Campaign</a></h3>
                                    <p>Facebook & Instagram Creatives</p>
                                </div>
                                <a href="project-details.php" class="icon"><i
                                        class="fa-regular fa-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="case-studies-card-items">
                            <div class="thumb">
                                <img src="assets/img/case-studies/04.jpg" alt="Professional Consulting Kit">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h3><a href="project-details.php">Professional Consulting Kit</a></h3>
                                    <p>Business Card & Letterhead Design</p>
                                </div>
                                <a href="project-details.php" class="icon"><i
                                        class="fa-regular fa-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section Start -->
    <section class="team-section-3 fix section-padding">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <div class="sub-title wow fadeInUp">
                        <span>OUR expert</span>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        Use SEO to Drive Growth <br> at Your Business
                    </h2>
                </div>
                <div class="main-button wow fadeInUp" data-wow-delay=".5s">
                    <a href="team.php"> <span class="theme-btn">EXPLORE MORE </span><span class="arrow-btn"><i
                                class="fa-regular fa-arrow-up-right"></i></span></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="team-card-items">
                        <div class="team-image">
                            <img src="assets/img/team/01.jpg" alt="img">
                        </div>
                        <div class="team-content">
                            <h3><a href="team-details.php">Reful Miya</a></h3>
                            <p>CO-Leader</p>
                        </div>
                        <div class="icon-shape">
                            <img src="assets/img/team/icon-shape.png" alt="img">
                            <div class="social-profile">
                                <ul>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="team-card-items">
                        <div class="team-image">
                            <img src="assets/img/team/02.jpg" alt="img">
                        </div>
                        <div class="team-content">
                            <h3><a href="team-details.php">Shikhon Islam</a></h3>
                            <p>Web Developer</p>
                        </div>
                        <div class="icon-shape">
                            <img src="assets/img/team/icon-shape.png" alt="img">
                            <div class="social-profile">
                                <ul>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="team-card-items">
                        <div class="team-image">
                            <img src="assets/img/team/03.jpg" alt="img">
                        </div>
                        <div class="team-content">
                            <h3><a href="team-details.php">Abdullah Islam</a></h3>
                            <p>Web Development</p>
                        </div>
                        <div class="icon-shape">
                            <img src="assets/img/team/icon-shape.png" alt="img">
                            <div class="social-profile">
                                <ul>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="team-card-items">
                        <div class="team-image">
                            <img src="assets/img/team/04.jpg" alt="img">
                        </div>
                        <div class="team-content">
                            <h3><a href="team-details.php">Leslie Alexander</a></h3>
                            <p>Nursing Assistant</p>
                        </div>
                        <div class="icon-shape">
                            <img src="assets/img/team/icon-shape.png" alt="img">
                            <div class="social-profile">
                                <ul>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marque Section Start -->
    <div class="marquee-section section-padding pt-0">
        <div class="mycustom-marque theme-blue-bg">
            <div class="scrolling-wrap">
                <div class="comm">
                    <div class="cmn-textslide stroke-text"><img src="assets/img/has.png" alt="img">Business Grow</div>
                    <div class="cmn-textslide"><img src="assets/img/has.png" alt="img">Digital Marketing </div>
                    <div class="cmn-textslide stroke-text"><img src="assets/img/has.png" alt="img">SEO Marketing</div>
                    <div class="cmn-textslide"><img src="assets/img/has.png" alt="img">Email Marketingimg</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide stroke-text"><img src="assets/img/has.png" alt="img">Business Grow</div>
                    <div class="cmn-textslide"><img src="assets/img/has.png" alt="img">Digital Marketing </div>
                    <div class="cmn-textslide stroke-text"><img src="assets/img/has.png" alt="img">SEO Marketing</div>
                    <div class="cmn-textslide"><img src="assets/img/has.png" alt="img">Email Marketingimg</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide stroke-text"><img src="assets/img/has.png" alt="img">Business Grow</div>
                    <div class="cmn-textslide"><img src="assets/img/has.png" alt="img">Digital Marketing </div>
                    <div class="cmn-textslide stroke-text"><img src="assets/img/has.png" alt="img">SEO Marketing</div>
                    <div class="cmn-textslide"><img src="assets/img/has.png" alt="img">Email Marketingimg</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide stroke-text"><img src="assets/img/has.png" alt="img">Business Grow</div>
                    <div class="cmn-textslide"><img src="assets/img/has.png" alt="img">Digital Marketing </div>
                    <div class="cmn-textslide stroke-text"><img src="assets/img/has.png" alt="img">SEO Marketing</div>
                    <div class="cmn-textslide"><img src="assets/img/has.png" alt="img">Email Marketingimg</div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section Start -->
    <section class="about-section-2 fix section-padding bg-cover"
        style="background-image: url('assets/img/team/team-bg.jpg');">
        <div class="bg-shape">
            <img src="assets/img/about/bg-shape-2.png" alt="img">
        </div>
        <div class="container">
            <div class="about-wrapper-2">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="about-image-2 wow img-custom-anim-left" data-wow-duration="1.5s"
                            data-wow-delay="0.3s">
                            <img src="assets/img/choose-us.png" alt="MS Glyph - Precision Digital Agency Delhi NCR"
                                class="w-100">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title">
                                <div class="sub-title bg-color-2 wow fadeInUp">
                                    <span>Why MS Glyph?</span>
                                </div>
                                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                    Your Silent Partner in Digital Excellence
                                </h2>
                            </div>
                            <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                We don't just provide services; we act as a high-precision execution arm for your brand.
                                From the technical architecture of a website to the nuance of a translated sentence, we
                                focus on the small details that drive big profits. We strip away the jargon and deliver
                                tangible growth.
                            </p>
                            <div class="icon-items-area">
                                <div class="icon-items wow fadeInUp" data-wow-delay=".3s">
                                    <div class="content mt-0">
                                        <h3>Precision-First Approach</h3>
                                        <p>Every pixel and every word is checked for accuracy and brand alignment.</p>
                                    </div>
                                </div>
                                <div class="icon-items wow fadeInUp" data-wow-delay=".5s">
                                    <div class="content mt-0">
                                        <h3>Global Readiness</h3>
                                        <p>With our integrated translation and proofreading services, we make sure your
                                            brand is ready for international markets.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="main-button wow fadeInUp" data-wow-delay=".3s">
                                <a href="about.php"> <span class="theme-btn">EXPLORE MORE </span><span
                                        class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cta-marketing-2 section-padding pb-0">
            <div class="container">
                <div class="cta-marketing-wrapper">
                    <div class="content">
                        <div class="section-title">
                            <div class="sub-title bg-color-3 wow fadeInUp">
                                <span>Free Marketing</span>
                            </div>
                            <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                                Free digital marketing
                            </h2>
                        </div>
                        <ul class="list mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path
                                        d="M7.38397 14.1797C7.34153 14.1797 7.29954 14.171 7.26066 14.1539C7.22178 14.1369 7.18683 14.1121 7.15803 14.0809L1.06612 7.49119C1.02551 7.44726 0.99859 7.39244 0.988651 7.33344C0.978712 7.27445 0.986187 7.21384 1.01016 7.15902C1.03414 7.10421 1.07357 7.05758 1.12364 7.02483C1.17371 6.99208 1.23223 6.97464 1.29206 6.97464H4.22437C4.26839 6.97464 4.31191 6.98409 4.35197 7.00234C4.39204 7.0206 4.42772 7.04723 4.45661 7.08045L6.49255 9.42273C6.71258 8.95239 7.13852 8.16925 7.88597 7.21497C8.99095 5.8042 11.0463 3.7294 14.5627 1.85642C14.6307 1.82023 14.7097 1.81083 14.7843 1.83009C14.8588 1.84936 14.9235 1.89587 14.9654 1.96046C15.0073 2.02504 15.0235 2.103 15.0108 2.17894C14.998 2.25488 14.9573 2.32328 14.8966 2.37064C14.8831 2.38113 13.5273 3.44882 11.967 5.40448C10.5309 7.20417 8.62191 10.1469 7.68255 13.946C7.66605 14.0128 7.62767 14.0721 7.57354 14.1144C7.5194 14.1568 7.45263 14.1799 7.38388 14.1799L7.38397 14.1797Z"
                                        fill="white" />
                                </svg>
                                Digital marketing
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path
                                        d="M7.38397 14.1797C7.34153 14.1797 7.29954 14.171 7.26066 14.1539C7.22178 14.1369 7.18683 14.1121 7.15803 14.0809L1.06612 7.49119C1.02551 7.44726 0.99859 7.39244 0.988651 7.33344C0.978712 7.27445 0.986187 7.21384 1.01016 7.15902C1.03414 7.10421 1.07357 7.05758 1.12364 7.02483C1.17371 6.99208 1.23223 6.97464 1.29206 6.97464H4.22437C4.26839 6.97464 4.31191 6.98409 4.35197 7.00234C4.39204 7.0206 4.42772 7.04723 4.45661 7.08045L6.49255 9.42273C6.71258 8.95239 7.13852 8.16925 7.88597 7.21497C8.99095 5.8042 11.0463 3.7294 14.5627 1.85642C14.6307 1.82023 14.7097 1.81083 14.7843 1.83009C14.8588 1.84936 14.9235 1.89587 14.9654 1.96046C15.0073 2.02504 15.0235 2.103 15.0108 2.17894C14.998 2.25488 14.9573 2.32328 14.8966 2.37064C14.8831 2.38113 13.5273 3.44882 11.967 5.40448C10.5309 7.20417 8.62191 10.1469 7.68255 13.946C7.66605 14.0128 7.62767 14.0721 7.57354 14.1144C7.5194 14.1568 7.45263 14.1799 7.38388 14.1799L7.38397 14.1797Z"
                                        fill="white" />
                                </svg>
                                ECO optimization
                            </li>
                        </ul>
                    </div>
                    <div class="cta-input wow fadeInUp" data-wow-delay=".3s">
                        <input type="email" id="email" placeholder="Your email address">
                        <button class="newsletter-btn" type="submit">
                            <i class="fa-regular fa-arrow-right-long"></i>
                        </button>
                    </div>
                    <div class="cta-marketing-image wow img-custom-anim-right" data-wow-duration="1.5s"
                        data-wow-delay="0.3s">
                        <img src="assets/img/cta-marketing.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section Start -->
    <section class="testimonial-section-3 section-padding pt-0">
        <div class="overlay-shape">
            <img src="assets/img/testimonial/overlay-shape.png" alt="img">
        </div>
        <div class="overlay-shape-2">
            <img src="assets/img/testimonial/overlay-shape-2.png" alt="img">
        </div>
        <div class="left-shape">
            <img src="assets/img/testimonial/left-shape.png" alt="img">
        </div>
        <div class="right-shape">
            <img src="assets/img/testimonial/right-shape.png" alt="img">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <div class="sub-title wow fadeInUp">
                    <span>Client Success</span>
                </div>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Trusted by Industry Leaders
                </h2>
            </div>
            <div class="testimonial-wrapper-3">
                <div class="client-1">
                    <img src="assets/img/testimonial/06.png" alt="img">
                </div>
                <div class="client-2">
                    <img src="assets/img/testimonial/07.png" alt="img">
                </div>
                <div class="client-3">
                    <img src="assets/img/testimonial/08.png" alt="img">
                </div>
                <div class="client-4">
                    <img src="assets/img/testimonial/09.png" alt="img">
                </div>
                <div class="swiper testimonial-slider-2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-content">
                                <div class="icon">
                                    <img src="assets/img/testimonial/quote.png" alt="img">
                                </div>
                                <p>
                                    MS Glyph didn't just build a website; they architected a digital authority. Their
                                    precision in content and design transformed how my clients perceive my consulting
                                    firm. Truly a silent execution partner.
                                </p>
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="assets/img/testimonial/05.png" alt="img">
                                    </div>
                                    <div class="content">
                                        <h6>Dr. Arvin Sharma</h6>
                                        <span>Strategic Business Consultant</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-content">
                                <div class="icon">
                                    <img src="assets/img/testimonial/quote.png" alt="img">
                                </div>
                                <p>
                                    Dominating the Delhi NCR search results seemed impossible until we worked with MS
                                    Glyph.
                                    Their local SEO and ad creatives drove more foot traffic in three months than we saw
                                    all last year.
                                </p>
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="assets/img/testimonial/05.png" alt="img">
                                    </div>
                                    <div class="content">
                                        <h6>Rajesh Khanna</h6>
                                        <span>CEO, Metro Real Estate</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-content">
                                <div class="icon">
                                    <img src="assets/img/testimonial/quote.png" alt="img">
                                </div>
                                <p>
                                    Their translation and proofreading services are flawless. They captured our brand
                                    voice perfectly for international markets while maintaining the high-end design of
                                    our
                                    pitch decks.
                                </p>
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="assets/img/testimonial/05.png" alt="img">
                                    </div>
                                    <div class="content">
                                        <h6>Elena Rostova</h6>
                                        <span>Founder, GlobalTech Solutions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cta Counter Section Start -->
    <section class="cta-counter-section-2 section-padding bg-cover"
        style="background-image: url('assets/img/cta-counter-bg.jpg');">
        <div class="container">
            <div class="cta-counter-wrapper-2">
                <div class="section-title-area">
                    <div class="section-title">
                        <div class="sub-title bg-color-3 wow fadeInUp">
                            <span>Counter</span>
                        </div>
                        <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                            Make your marketing <br> more effective
                        </h2>
                    </div>
                    <div class="counter-box-area">
                        <div class="counter-text wow fadeInUp" data-wow-delay=".3s">
                            <h2>
                                <span class="count">19.4</span>K
                            </h2>
                            <p>Projects Delivered</p>
                        </div>
                        <div class="counter-text wow fadeInUp" data-wow-delay=".5s">
                            <h2>
                                <span class="count">95.2</span>K
                            </h2>
                            <p>Global Clients</p>
                        </div>
                        <div class="counter-text wow fadeInUp" data-wow-delay=".7s">
                            <h2>
                                <span class="count">142.6</span>K
                            </h2>
                            <p>Creatives Crafted</p>
                        </div>
                    </div>
                </div>
                <div class="cta-video-image wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                    <img src="assets/img/cta-video.jpg" alt="img">
                    <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-icon video-popup">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section Start -->
    <section class="news-section pt-0 section-padding">
        <div class="container">
            <div class="section-title text-center">
                <div class="sub-title bg-color-2 wow fadeInUp">
                    <span>Our Insights</span>
                </div>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Industry Expertise & Global Trends
                </h2>
            </div>
        </div>
            <div class="row">
                <?php
                // MS Glyph Silent Execution Fallback - Insights
                $blogs_list = [
                    ['title' => 'Decoding Local SEO: How to Dominate Delhi NCR’s Search Market', 'content_excerpt' => 'Why local visibility is the highest-ROI move for Sector 62 businesses in 2026.', 'category' => 'SEO Strategy', 'author' => 'MS Glyph Team', 'publish_date' => '2026-02-20', 'image_path' => 'assets/img/news/05.jpg', 'slug' => 'decoding-local-seo-delhi-ncr'],
                    ['title' => 'Visual Psychology: Why Every Pixel Matters in High-Ticket Branding', 'content_excerpt' => 'Exploring the "Glyph" philosophy—how micro-details in UI and design build macro-trust.', 'category' => 'Design Thinking', 'author' => 'MS Glyph Team', 'publish_date' => '2026-03-15', 'image_path' => 'assets/img/news/06.jpg', 'slug' => 'visual-psychology-pixel-matters'],
                    ['title' => 'The Global Bridge: Why Precision Translation is Your Greatest ROI', 'content_excerpt' => 'Protecting your reputation in international markets through cultural nuance.', 'category' => 'Global Scaling', 'author' => 'MS Glyph Team', 'publish_date' => '2026-04-10', 'image_path' => 'assets/img/news/07.jpg', 'slug' => 'global-bridge-precision-translation']
                ];

                if (isset($agency_blueprint_conn) && $agency_blueprint_conn !== null) {
                    try {
                        $stmt = $agency_blueprint_conn->query("SELECT * FROM blogs ORDER BY publish_date DESC LIMIT 3");
                        if ($stmt->rowCount() > 0) {
                            $blogs_list = $stmt->fetchAll();
                        }
                    } catch (PDOException $e) {
                        // Silent fail
                    }
                }

                $index = 0;
                foreach ($blogs_list as $blog) {
                    $title = htmlspecialchars($blog['title']);
                    $category = htmlspecialchars($blog['category']);
                    $author = htmlspecialchars($blog['author'] ?: 'MS Glyph Team');
                    $date = date('M d, Y', strtotime($blog['publish_date']));
                    $image = htmlspecialchars($blog['image_path']);
                    $slug = htmlspecialchars($blog['slug']);
                    $delay = 0.2 + (($index % 3) * 0.2);
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".<?php echo $delay * 10; ?>s">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="<?php echo $image; ?>" alt="img">
                        </div>
                        <div class="news-content">
                            <ul class="post-cat">
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    <?php echo $author; ?>
                                </li>
                                <li>
                                    <i class="fa-regular fa-tag"></i>
                                    <?php echo $category; ?>
                                </li>
                            </ul>
                            <h5><a href="news-details.php?s=<?php echo $slug; ?>"><?php echo $title; ?></a></h5>
                            <a href="news-details.php?s=<?php echo $slug; ?>" class="link-btn">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                            <div class="post-date">
                                <i class="fa-light fa-calendar-days"></i>
                                <?php echo $date; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    $index++;
                } 
                ?>
            </div>
        </div>
    </section>

    <!-- Cta Section Start -->
    <section class="cta-section section-padding pb-0">
        <div class="rokect-shape float-bob-y">
            <img src="assets/img/rokect.png" alt="img">
        </div>
        <div class="container">
            <div class="cta-wrapper bg-cover" style="background-image: url('assets/img/cta-bg.jpg');">
                <div class="cta-img wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                    <img src="assets/img/cta-img.png" alt="img">
                </div>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Stay Connected With <br> Cutting Edge IT
                </h2>
                <div class="main-button wow fadeInUp" data-wow-delay=".5s">
                    <a href="contact.php"> <span class="theme-btn"> talk TO A SPECIALIST </span><span
                            class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                </div>
            </div>
        </div>
    </section>

    <?php include_once 'includes/footer.php'; ?>