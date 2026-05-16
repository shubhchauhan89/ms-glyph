<?php
include_once 'includes/db.php';
include_once 'includes/config.php';
$page_title = 'Service Details';
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
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">Service Details</h1>
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
                            Service Details
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="service-details-section section-padding">
            <div class="container">
                <div class="service-details-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="details-image">
                                <img src="assets/img/service/details-1.jpg" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="row g-5">
                        <div class="col-12 col-lg-4">
                            <div class="main-sidebar sticky-style">
                                <div class="single-sidebar-widget">
                                    <div class="wid-title">
                                        <h4>All Services</h4>
                                    </div>
                                    <div class="service-widget-categories">
                                        <ul>
                                            <li><a href="service-details.php">Web Development</a> <span><i class="fa-regular fa-arrow-right-long"></i></span></li>
                                            <li><a href="service-details.php">Content Marketing</a> <span><i class="fa-regular fa-arrow-right-long"></i></span></li>
                                            <li class="active"><a href="service-details.php">Social Media Mesketing</a><span><i class="fa-regular fa-arrow-right-long"></i></span></li>
                                            <li><a href="service-details.php">Affiliate Marketing</a> <span><i class="fa-regular fa-arrow-right-long"></i></span></li>
                                            <li><a href="service-details.php">Search Engine Marketing (SEM)</a> <span><i class="fa-regular fa-arrow-right-long"></i></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="service-details-content">
                                <h3>
                                    Digital Marketing
                                </h3>
                                <p class="mb-4">
                                    At tempus aenean sapien torquent sed diam class efficitur mus morbi eros dictum quam augue ac laor eet ligula libero mi commodo nibh hac fermentum orci ad pharetra consequat justo duis turpis lorem elit dui consectetur magnis lacinia odio per placerat vestibulum volutpat mauris mollis primis imperdiet posu ere ex enim gravida cras congue
                                </p>
                                <p class="mb-4">
                                    pellentesque vulputate malesuada dictumst fames interdum cursus an te tellus porta ullamcorper accumsan non eu adipiscing integer venenatis sagittis arcu curae finibus ridi culus aliquam velit lobortis senectus vitae sollicitudin sit consectetuer ultricies rutrum parturient pede nisi nascetur habitant netus quisque elementum inceptos nam felis penatibus feugiat
                                </p>
                                <h3>
                                    What We Provide
                                </h3>
                                <p class="mb-5">
                                    At tempus aenean sapien torquent sed diam class efficitur mus morbi eros dictum quam augue ac laor eet ligula libero mi commodo nibh hac fermentum orci ad pharetra consequat justo duis turpis lorem elit dui consectetur magnis lacinia odio per placerat vestibulum volutpat mauris mollis primis imperdiet posu ere ex enim gravida cras congue
                                </p>
                                <div class="thumb">
                                    <img src="assets/img/service/details-2.jpg" alt="img">
                                </div>
                                <h3>
                                    The Challange
                                </h3>
                                <p>
                                    At tempus aenean sapien torquent sed diam class efficitur mus morbi eros dictum quam augue ac laor eet ligula libero mi commodo nibh hac fermentum orci ad pharetra consequat justo duis turpis lorem elit dui consectetur magnis lacinia odio per placerat vestibulum volutpat mauris mollis primis imperdiet posu ere ex enim gravida cras congue
                                </p>
                                <div class="details-list-items">
                                    <ul class="details-list">
                                        <li><i class="fa-solid fa-circle-check"></i>Various analysis options.</li>
                                        <li><i class="fa-solid fa-circle-check"></i>Advance Data analysis operation.</li>
                                    </ul>
                                    <ul class="details-list">
                                        <li><i class="fa-solid fa-circle-check"></i>Page Load (time, size, number of requests).</li>
                                        <li><i class="fa-solid fa-circle-check"></i>Advance Data analysis operation.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="faq-wrapper mt-5">
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
            </div>
        </section>

        <?php include_once 'includes/footer.php'; ?>