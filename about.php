<?php
include_once 'includes/db.php';
include_once 'includes/config.php';
$page_title = 'About';
include_once 'includes/header.php';
?>

        <!-- Breadcrumb Section Start -->
        <div class="breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/breadcrumb.jpg');">
            <div class="left-shape">
                <img src="assets/img/breadcrumb-shape.png" alt="img">
            </div>
            <div class="right-shape">
                <img src="assets/img/breadcrumb-shape-2.png" alt="img">
            </div>
            <div class="container">
                <div class="page-heading">
                    <div class="breadcrumb-sub-title">
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">about us</h1>
                    </div>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                        <li>
                            <a href="index.php">
                            Home
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            about us
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- About Section Start -->
        <section class="about-section-2 fix section-padding">
            <div class="bg-shape">
                <img src="assets/img/about/bg-shape-2.png" alt="img">
            </div>
            <div class="right-shape float-bob-x">
                <img src="assets/img/case-studies/right-shaape.png" alt="img">
            </div>
            <div class="container">
                <div class="about-wrapper-2">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="about-image">
                                <img src="assets/img/about/01.jpg" alt="img" class="wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                <div class="box-shape float-bob-y">
                                    <img src="assets/img/about/box-shape-2.png" alt="img">
                                </div>
                                <div class="gap-shape float-bob-x">
                                    <img src="assets/img/about/grap-2.png" alt="img">
                                </div>
                                <a href="about.php" class="circle-button">
                                    <i class="fa-regular fa-arrow-up-right"></i>
                                    <span class="text-circle">
                                        <img src="assets/img/about/white-text.png" alt="img">
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title">
                                    <div class="sub-title bg-color-2 wow fadeInUp">
                                        <span>About the Studio</span>
                                    </div>
                                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                        Crafting Absolute Visual & Verbal Authority.
                                    </h2>
                                </div>
                                <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                    MS Glyph is a premium creative studio and structural linguistic partner. We operate behind the scenes as 
                                    an elite, invisible extension of your business, focusing on the meticulous detail work that elevates 
                                    corporate presentation layout and global communications from standard to irreplaceable.
                                </p>
                                <div class="icon-items-area">
                                    <div class="icon-items wow fadeInUp" data-wow-delay=".3s">
                                        <div class="icon">
                                            <i class="icon-01"></i>
                                        </div>
                                        <div class="content">
                                            <h3>The Mission</h3>
                                            <p>To eliminate visual compromise and linguistic friction, delivering high-fidelity brand identities, executive presentation layouts, and pristine localized assets that command market respect.</p>
                                        </div>
                                    </div>
                                    <div class="icon-items wow fadeInUp" data-wow-delay=".5s">
                                        <div class="icon">
                                            <i class="icon-02"></i>
                                        </div>
                                        <div class="content">
                                            <h3>The Vision</h3>
                                            <p>To remain the definitive, trusted silent partner and extended execution arm for global firms and elite consultants, setting the ultimate modern benchmark for multi-lingual creative craft.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-button">
                                    <div class="main-button wow fadeInUp" data-wow-delay=".3s">
                                        <a href="about.php"> <span class="theme-btn">EXPLORE STUDIO </span><span class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                                    </div>
                                    <a href="about.php" class="link-btn wow fadeInUp" data-wow-delay=".5s">OUR PORTFOLIO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cta Counter Section Start -->
        <section class="cta-counter-section-3 fix section-bg section-padding bg-cover" style="background-image: url('assets/img/cta-counter-bg.jpg');">
            <div class="container">
                <div class="cta-counter-wrapper-2">
                    <div class="section-title-area">
                        <div class="section-title">
                            <div class="sub-title bg-color-3 wow fadeInUp">
                                <span>Studio Metrics</span>
                            </div>
                            <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                                Design that commands.
                            </h2>
                        </div>
                        <div class="counter-box-area">
                            <div class="counter-text wow fadeInUp" data-wow-delay=".3s">
                                <h2>
                                    <span class="count">450</span>+
                                </h2>
                                <p>Brand Identities Built</p>
                            </div>
                            <div class="counter-text wow fadeInUp" data-wow-delay=".5s">
                                <h2>
                                    <span class="count">12</span>K+
                                </h2>
                                <p>Creative Assets Crafted</p>
                            </div>
                            <div class="counter-text wow fadeInUp" data-wow-delay=".7s">
                                <h2>
                                    <span class="count">100</span>%
                                </h2>
                                <p>Linguistic Accuracy</p>
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

        <!-- Values Section Start -->
        <section class="value-section fix section-padding section-bg pt-0">
            <div class="value-shape">
                <img src="assets/img/value-shape.png" alt="img">
            </div>
            <div class="value-shape-2">
                <img src="assets/img/value-shape-2.png" alt="img">
            </div>
            <div class="container">
                <div class="section-title text-center wow fadeInUp" data-wow-delay=".3s">
                    <h2>Why "Glyph"?</h2>
                    <p class="mt-3">
                        In typography, a glyph is the elemental visual form of a character that gives shape to a thought. We believe a premium brand is an accumulation of these foundational units—pixels, layouts, and words. If a single element is misaligned or culturally mistranslated, the entire message fractures. We ensure every glyph of your brand is flawless.
                    </p>
                </div>
                <div class="row mt-4">
                    <!-- Box 1: Precision-First -->
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="value-box-items">
                            <div class="icon">
                            <i class="icon-01"></i>
                            </div>
                            <div class="content">
                                <h3>Precision-First</h3>
                                <p>
                                    Every vector line, pixel layout, and typographic alignment is rigorously reviewed for absolute aesthetic accuracy and brand integrity.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Box 2: Impact Driven -->
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                        <div class="value-box-items">
                            <div class="icon">
                                <i class="icon-02"></i>
                            </div>
                            <div class="content">
                                <h3>Impact Driven</h3>
                                <p>
                                    We replace generic stock layouts with bespoke ad creatives, product packaging, and presentation templates engineered to command market attention.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Box 3: Global Readiness -->
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                        <div class="value-box-items">
                            <div class="icon">
                                <i class="icon-03"></i>
                            </div>
                            <div class="content">
                                <h3>Global Readiness</h3>
                                <p>
                                    Through our integrated native translation and deep structural proofreading, your corporate collateral is adapted seamlessly for international demographics.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Box 4: Executive Standard -->
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                        <div class="value-box-items">
                            <div class="icon">
                                <i class="icon-04"></i>
                            </div>
                            <div class="content">
                                <h3>Executive Standard</h3>
                                <p>
                                    Bespoke brand guidelines, elite pitch decks, and custom digital graphics scaled explicitly to match the positioning of high-ticket enterprises.
                                </p>
                            </div>
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
                            <!-- Testimonial 1 -->
                            <div class="swiper-slide">
                                <div class="testimonial-content">
                                    <div class="icon">
                                        <img src="assets/img/testimonial/quote.png" alt="img">
                                    </div>
                                    <p>
                                        MS Glyph didn't just refresh our logos; they built a complete brand identity system. Their 
                                        precision in visual composition and executive presentation design completely transformed how 
                                        enterprise clients perceive our consulting firm. They are our trusted, silent creative arm.
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
                            
                            <!-- Testimonial 2 -->
                            <div class="swiper-slide">
                                <div class="testimonial-content">
                                    <div class="icon">
                                        <img src="assets/img/testimonial/quote.png" alt="img">
                                    </div>
                                    <p>
                                        Launching luxury properties across Delhi NCR requires absolute aesthetic perfection. MS Glyph 
                                        delivered exceptional product catalogs, high-CTR digital ad creatives, and premium brochures 
                                        that matched our high-end market positioning flawlessly. 
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
                            
                            <!-- Testimonial 3 -->
                            <div class="swiper-slide">
                                <div class="testimonial-content">
                                    <div class="icon">
                                        <img src="assets/img/testimonial/quote.png" alt="img">
                                    </div>
                                    <p>
                                        Their integrated translation and proofreading services are spectacular. They captured our exact 
                                        brand voice for international markets while simultaneously managing the complex Adobe-based 
                                        layouts of our corporate pitch decks.
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
                        Transform Your Brand With <br> Precision Design & Copy
                    </h2>
                    <div class="main-button wow fadeInUp" data-wow-delay=".5s">
                        <a href="contact.php"> <span class="theme-btn"> Consult With Us </span><span class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                    </div>
                </div>
            </div>
        </section>

        <?php include_once 'includes/footer.php'; ?>