<?php
include_once 'includes/db.php';
include_once 'includes/config.php';
$page_title = 'Contact';
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
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">Start Your Blueprint.</h1>
                        <p class="wow fadeInUp  mt-3" data-wow-delay=".4s" style="max-width: 600px; margin: 0 auto;">Ready to execute your vision with precision? Reach out to our Delhi NCR-based team to discuss your next project.</p>
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
                            Contact Us
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contact Info Section Start -->
        <section class="contact-info-section fix section-padding">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="contact-info-items text-center active">
                            <div class="icon">
                               <i class="icon-09"></i>
                            </div>
                            <div class="content">
                                <h3>Our Studio</h3>
                                <p>
                                    <?php echo htmlspecialchars($site_address); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="contact-info-items text-center">
                            <div class="icon">
                                <i class="icon-10"></i>
                            </div>
                            <div class="content">
                                <h3>Digital Correspondence</h3>
                                <p>
                                    <a href="mailto:<?php echo htmlspecialchars($site_email); ?>"><?php echo htmlspecialchars($site_email); ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="contact-info-items text-center">
                            <div class="icon">
                                <i class="icon-11"></i>
                            </div>
                            <div class="content">
                                <h3>Direct Line</h3>
                                <p>
                                    <a href="tel:+91<?php echo htmlspecialchars($site_number); ?>">+91-<?php echo htmlspecialchars($site_number); ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                        <div class="contact-info-items text-center">
                            <div class="icon">
                                <i class="fal fa-clock" style="font-size: 32px; color: #2151f5;"></i>
                            </div>
                            <div class="content">
                                <h3>Execution Hours</h3>
                                <p>
                                    Mon - Sat: <br> 10:00 AM - 7:00 PM
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section Start -->
        <section class="contact-section-33 fix section-padding pt-0">
            <div class="container">
                <div class="contact-wrapper-2">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-6">
                            <div class="map-items">
                                <div class="googpemap">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d874.9041734950052!2d77.2706916753922!3d28.701110594549085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfc13b3ab8ff1%3A0x57f6407f84107f8c!2sB1%2F18%2C%20C1%20Block%2C%20Block%20B%2C%20Yamuna%20Vihar%2C%20Shahdara%2C%20Delhi%2C%20110053!5e0!3m2!1sen!2sin!4v1779634350654!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-content">
                                <h2>Request a Project Blueprint</h2>
                                <p>
                                    Fill out the details below, and our lead architects will get back to you with a strategic execution plan within 24 hours.
                                </p>
                                <form action="contact.php" id="contact-form" method="POST" class="contact-form-items">
                                    <div class="row g-4">
                                        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                            <div class="form-clt">
                                                <span>Your name*</span>
                                                <input type="text" name="name" id="name" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                            <div class="form-clt">
                                                <span>Your Email*</span>
                                                <input type="text" name="email" id="email" placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 wow fadeInUp" data-wow-delay=".7s">
                                            <div class="form-clt">
                                                <span>Write Message*</span>
                                                <textarea name="message" id="message" placeholder="Write Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 wow fadeInUp" data-wow-delay=".9s">
                                            <button type="submit" class="theme-btn">
                                                Send Message <i class="fa-solid fa-arrow-right-long"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
                        <a href="contact.php"> <span class="theme-btn"> talk TO  A SPECIALIST </span><span class="arrow-btn"><i class="fa-regular fa-arrow-up-right"></i></span></a>
                    </div>
                </div>
            </div>
        </section>

        <?php include_once 'includes/footer.php'; ?>