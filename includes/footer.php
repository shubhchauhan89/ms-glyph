<?php
include 'admin/includes/conn.php';
include 'admin/includes/db.php';

$footer_services = mysqli_query($con, "SELECT `title`, `url` FROM `services` ORDER BY `id` DESC LIMIT 7");
$footer_blog_query = mysqli_query($con, "SELECT `title`, `img`, `url` FROM `blog` ORDER BY `id` DESC LIMIT 2");
?>

<style>
    /* Container to hold and stack both buttons */
    .floating-container {
        position: fixed;
        bottom: 40px;
        left: 40px; /* Positioned on the left */
        display: flex;
        flex-direction: column; /* Stacks buttons vertically */
        gap: 15px; /* Space between the buttons */
        z-index: 1000;
    }

    /* Shared styles for both buttons */
    .float-btn {
        width: 60px;
        height: 60px;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 10px rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .float-icon {
        width: 32px;
        height: 32px;
        fill: white;
    }

    /* WhatsApp Specific Styles */
    .whatsapp-btn {
        background-color: #25d366;
    }
    .whatsapp-btn:hover {
        background-color: #128C7E;
        transform: scale(1.05);
        box-shadow: 2px 2px 15px rgba(0,0,0,0.3);
    }

    /* Phone Specific Styles */
    .phone-btn {
        background-color: #007bff; /* Standard Blue */
    }
    .phone-btn:hover {
        background-color: #0056b3;
        transform: scale(1.05);
        box-shadow: 2px 2px 15px rgba(0,0,0,0.3);
    }

    /* Adjust size for mobile screens */
    @media screen and (max-width: 767px) {
        .floating-container {
            bottom: 20px;
            left: 20px; /* Fixed: keeps it on the left on mobile too */
            gap: 10px;
        }
        .float-btn {
            width: 50px;
            height: 50px;
        }
        .float-icon {
            width: 25px;
            height: 25px;
        }
    }
</style>

<div class="floating-container">
    <a href="tel:+919871399431" 
       class="float-btn phone-btn" 
       aria-label="Call us directly">
        
        <svg class="float-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
        </svg>
    </a>

    <a href="https://wa.me/919871399431?text=Hi%20there!%20I%20have%20a%20question%20about%20your%20services." 
       class="float-btn whatsapp-btn" 
       target="_blank" 
       rel="noopener noreferrer"
       aria-label="Chat with us on WhatsApp">
        
        <svg class="float-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
        </svg>
    </a>
</div>
<!-- Footer Section Start -->
    <section class="footer-section footer-bg fix">
        <div class="container">
            <div class="footer-widgets-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <a href="index.php">
                                    <img src="admin/assets/images/<?php echo $row["footer_logo"]; ?>" alt="img">
                                </a>
                            </div>
                            <div class="footer-content">
                                <p>
                                    <?php echo htmlspecialchars($site_description); ?>
                                </p>
                                <div class="social-icon d-flex align-items-center">
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Quick Links</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="about.php">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="service.php">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Our Services
                                    </a>
                                </li>
                                <li>
                                    <a href="project.php">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Our Portfolio
                                    </a>
                                </li>
                                <li>
                                    <a href="blog.php">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Blogs
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.php">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Recent Posts</h3>
                            </div>
                            <div class="recent-post-area">
                                <div class="recent-post-items">
                                    <div class="thumb">
                                        <img src="<?php echo $domain; ?>assets/img/news/pp1.jpg" alt="post-img">
                                    </div>
                                    <div class="content">
                                        <ul class="post-date">
                                            <li>
                                                <i class="fa-solid fa-calendar-days me-2"></i>
                                                20 Feb, 2026
                                            </li>
                                        </ul>
                                        <h6>
                                            <a href="blog-detail.php">
                                                Decoding Local SEO: How to <br> Dominate Delhi NCR’s Search
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="recent-post-items mb-0">
                                    <div class="thumb">
                                        <img src="<?php echo $domain; ?>assets/img/news/pp2.jpg" alt="post-img">
                                    </div>
                                    <div class="content">
                                        <ul class="post-date">
                                            <li>
                                                <i class="fa-solid fa-calendar-days me-2"></i>
                                                15 Mar, 2026
                                            </li>
                                        </ul>
                                        <h6>
                                            <a href="blog-detail.php">
                                                Visual Psychology: Why Every <br> Pixel Matters
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-xl-5 wow fadeInUp" data-wow-delay=".8s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Contact Us</h3>
                            </div>
                            <div class="footer-content">
                                <ul class="contact-info">
                                    <li>
                                        <i class="fa-regular fa-envelope"></i>
                                        <a href="mailto:<?php echo htmlspecialchars($site_email); ?>"><?php echo htmlspecialchars($site_email); ?></a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-phone-volume"></i>
                                        <a href="tel:+910000000000">+91-000-0000000</a>
                                    </li>
                                </ul>
                                <div class="footer-input">
                                    <input type="email" id="email2" placeholder="Your email address">
                                    <button class="newsletter-btn" type="submit">
                                        <i class="fa-regular fa-arrow-right-long"></i>
                                    </button>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked="">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        I agree to the <a href="contact.php">Privacy Policy.</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-wrapper d-flex align-items-center justify-content-between">
                    <p class="wow fadeInLeft color-2" data-wow-delay=".3s">
                        © <?php echo date("Y"); ?> <?php echo htmlspecialchars($site_name); ?>. All Rights Reserved.
                    </p>
                    <ul class="footer-menu wow fadeInRight" data-wow-delay=".5s">
                        <li>
                            <a href="contact.php">
                                Terms & Condition
                            </a>
                        </li>
                        <li>
                            <a href="contact.php">
                                Privacy Policy
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="#" id="scrollUp" class="scroll-icon">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>
    </section>

    <!--<< All JS Plugins >>-->
    <script src="<?php echo $domain; ?>assets/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="<?php echo $domain; ?>assets/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="<?php echo $domain; ?>assets/js/bootstrap.bundle.min.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="<?php echo $domain; ?>assets/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="<?php echo $domain; ?>assets/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="<?php echo $domain; ?>assets/js/jquery.counterup.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="<?php echo $domain; ?>assets/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="<?php echo $domain; ?>assets/js/jquery.meanmenu.min.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="<?php echo $domain; ?>assets/js/jquery.magnific-popup.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="<?php echo $domain; ?>assets/js/wow.min.js"></script>
    <!--<< Circle Progress Js >>-->
    <script src="<?php echo $domain; ?>assets/js/circle-progress.js"></script>
    <!--<< Main.js >>-->
    <script src="<?php echo $domain; ?>assets/js/main.js"></script>
</body>

</html>