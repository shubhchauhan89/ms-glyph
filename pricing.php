<?php
include_once 'includes/db.php';
include_once 'includes/config.php';
$page_title = 'Pricing';
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
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">Our Pricing</h1>
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
                            Our Pricing
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Pricing Section Start -->
        <section class="pricing-section fix section-padding">
            <div class="container">
                <div class="section-title-area">
                    <div class="section-title">
                        <div class="sub-title bg-color-2 wow fadeInUp">
                            <span>OUR PRICNG PLAN</span>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">
                            Our awesome <br> Pricing Plan
                        </h2>
                    </div>
                    <div class="pricing-content">
                        <div class="pricing-tab-header">
                            <ul class="nav" role="tablist">
                                <li class="nav-item wow fadeInUp" data-wow-delay=".3s" role="presentation">
                                    <a href="#monthly" data-bs-toggle="tab" class="nav-link active" aria-selected="true" role="tab">
                                    Monthly
                                    </a>
                                </li>
                                <li class="nav-item wow fadeInUp" data-wow-delay=".5s" role="presentation">
                                    <a href="#yearly" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">
                                    Yearly
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="monthly" class="tab-pane fade show active" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                <div class="pricing-box-items">
                                    <div class="pricing-header">
                                        <div class="content">
                                            <h4>Free Plans</h4>
                                            <h2>$00 <sub>/ Month</sub></h2>
                                        </div>
                                        <div class="icon">
                                            <img src="assets/img/cloud.png" alt="img">
                                        </div>
                                    </div>
                                    <ul class="price-list">
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 100 GB SSD Storage</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Weekly Backups</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Unlimited Free SSL</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 24/7 system Monitoring</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Free Domain ($9.99 value)</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> Dedicated IP Address</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> 20+ Payment Methods</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                    </ul>
                                    <div class="price-button">
                                        <a href="pricing.php" class="theme-btn">Get Started Now <i class="fa-regular fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                <div class="pricing-box-items style-2">
                                    <div class="pricing-header">
                                        <div class="content">
                                            <h4>Premium Plans</h4>
                                            <h2>$149 <sub>/ Month</sub></h2>
                                        </div>
                                        <div class="icon">
                                            <img src="assets/img/cloud.png" alt="img">
                                        </div>
                                    </div>
                                    <ul class="price-list">
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 100 GB SSD Storage</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Weekly Backups</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Unlimited Free SSL</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 24/7 system Monitoring</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Free Domain ($9.99 value)</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> Dedicated IP Address</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> 20+ Payment Methods</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                    </ul>
                                    <div class="price-button">
                                        <a href="pricing.php" class="theme-btn">Get Started Now <i class="fa-regular fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                                <div class="pricing-box-items">
                                    <div class="pricing-header">
                                        <div class="content">
                                            <h4>Extended Plan</h4>
                                            <h2>$99 <sub>/ Month</sub></h2>
                                        </div>
                                        <div class="icon">
                                            <img src="assets/img/cloud.png" alt="img">
                                        </div>
                                    </div>
                                    <ul class="price-list">
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 100 GB SSD Storage</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Weekly Backups</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Unlimited Free SSL</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 24/7 system Monitoring</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Free Domain ($9.99 value)</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> Dedicated IP Address</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> 20+ Payment Methods</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                    </ul>
                                    <div class="price-button">
                                        <a href="pricing.php" class="theme-btn">Get Started Now <i class="fa-regular fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="yearly" class="tab-pane fade" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="pricing-box-items">
                                    <div class="pricing-header">
                                        <div class="content">
                                            <h4>Free Plans</h4>
                                            <h2>$00 <sub>/ Month</sub></h2>
                                        </div>
                                        <div class="icon">
                                            <img src="assets/img/cloud.png" alt="img">
                                        </div>
                                    </div>
                                    <ul class="price-list">
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 100 GB SSD Storage</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Weekly Backups</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Unlimited Free SSL</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 24/7 system Monitoring</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Free Domain ($9.99 value)</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> Dedicated IP Address</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> 20+ Payment Methods</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                    </ul>
                                    <div class="price-button">
                                        <a href="pricing.php" class="theme-btn">Get Started Now <i class="fa-regular fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="pricing-box-items style-2">
                                    <div class="pricing-header">
                                        <div class="content">
                                            <h4>Premium Plans</h4>
                                            <h2>$149 <sub>/ Month</sub></h2>
                                        </div>
                                        <div class="icon">
                                            <img src="assets/img/cloud.png" alt="img">
                                        </div>
                                    </div>
                                    <ul class="price-list">
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 100 GB SSD Storage</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Weekly Backups</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Unlimited Free SSL</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 24/7 system Monitoring</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Free Domain ($9.99 value)</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> Dedicated IP Address</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> 20+ Payment Methods</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                    </ul>
                                    <div class="price-button">
                                        <a href="pricing.php" class="theme-btn">Get Started Now <i class="fa-regular fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="pricing-box-items">
                                    <div class="pricing-header">
                                        <div class="content">
                                            <h4>Extended Plan</h4>
                                            <h2>$99 <sub>/ Month</sub></h2>
                                        </div>
                                        <div class="icon">
                                            <img src="assets/img/cloud.png" alt="img">
                                        </div>
                                    </div>
                                    <ul class="price-list">
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 100 GB SSD Storage</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Weekly Backups</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Unlimited Free SSL</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> 24/7 system Monitoring</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1"><i class="fa-regular fa-check"></i> Free Domain ($9.99 value)</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> Dedicated IP Address</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                        <li>
                                            <span class="price-1 color-2"><i class="fa-solid fa-xmark"></i> 20+ Payment Methods</span>
                                            <span class="icon"><i class="fa-regular fa-circle-question"></i></span>
                                        </li>
                                    </ul>
                                    <div class="price-button">
                                        <a href="pricing.php" class="theme-btn">Get Started Now <i class="fa-regular fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Faq Section Start -->
        <section class="faq-section section-padding pt-0">
            <div class="container">
                <div class="faq-wrapper">
                    <div class="row g-4 justify-content-between">
                        <div class="col-xl-5 col-lg-6">
                            <div class="faq-content">
                                <div class="section-title">
                                    <div class="sub-title bg-color-2 wow fadeInUp">
                                        <span>FAQ's</span>
                                    </div>
                                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                        Let’s make something awesome together
                                    </h2>
                                </div>
                                <p class="wow fadeInUp" data-wow-delay=".5s">
                                    We're not just another agency – we're your digital growth partners. With
                                    years of industry experience and a passion for innovation, our team is
                                    dedicated to delivering measurable results propel your business forward.
                                </p>
                                <ul class="faq-list">
                                    <li class="wow fadeInUp" data-wow-delay=".3s">
                                        <i class="fa-regular fa-circle-check"></i>
                                        Top quality service
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay=".5s">
                                        <i class="fa-regular fa-circle-check"></i>
                                        Intermodal Shipping
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="faq-accordion-items">
                                <div class="faq-accordion">
                                    <div class="accordion" id="accordion">
                                        <div class="accordion-item mb-3 wow fadeInUp" data-wow-delay=".3s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                                                    Why Is SEO Important For Small Business?
                                                </button>
                                            </h5>
                                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Nullam faucibus eleifend mi eu varius. Integer vel tincidunt massa, quis semper odio.Mauris et mollis quam. Nullam fringilla erat id ante commodo maximus 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb-3 wow fadeInUp" data-wow-delay=".5s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                                    How do I choose the best SEO Agency?
                                                </button>
                                            </h5>
                                            <div id="faq2" class="accordion-collapse show" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Nullam faucibus eleifend mi eu varius. Integer vel tincidunt massa, quis semper odio.Mauris et mollis quam. Nullam fringilla erat id ante commodo maximus 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb-3 wow fadeInUp" data-wow-delay=".7s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                                    Better Security And Faster Server?
                                                </button>
                                            </h5>
                                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Nullam faucibus eleifend mi eu varius. Integer vel tincidunt massa, quis semper odio.Mauris et mollis quam. Nullam fringilla erat id ante commodo maximus 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb-0 wow fadeInUp" data-wow-delay=".7s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                                    Deployment Within Few Minutes
                                                </button>
                                            </h5>
                                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Nullam faucibus eleifend mi eu varius. Integer vel tincidunt massa, quis semper odio.Mauris et mollis quam. Nullam fringilla erat id ante commodo maximus 
                                                </div>
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
                        <a href="contact.php"> <span class="theme-btn"> talk TO  A SPECIALIST </span><span class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                    </div>
                </div>
            </div>
        </section>

        <?php include_once 'includes/footer.php'; ?>