<?php
include_once 'includes/db.php';
include_once 'includes/config.php';
$page_title = 'Project Details';
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
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">Case studies Details</h1>
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
                            Case studies Details
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Project Details Section Start -->
        <section class="project-details-section fix section-padding">
            <div class="container">
                <div class="project-details-wrapper">
                    <div class="project-details-items">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="details-top-items">
                                    <div class="details-left">
                                        <h2>Building digital products end to end</h2>
                                        <ul class="post-cat">
                                            <li>
                                                <a href="project-details.php">creative</a>
                                            </li>
                                            <li>
                                                <a href="project-details.php">Branding</a>
                                            </li>
                                            <li>
                                                <a href="project-details.php">Analytics</a>
                                            </li>
                                            <li>
                                                <a href="project-details.php">Audience</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="details-right">
                                        <ul class="client-details">
                                            <li>
                                                Client: <span>David Martin</span>
                                            </li>
                                            <li>
                                                Year: <span>2026</span>
                                            </li>
                                            <li>
                                                Author: <span>Robart Mory</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-details-content"> 
                        <h3>Overview</h3>
                        <div class="row g-4">
                            <div class="col-lg-7">
                                <p>
                                    Nam posuere mauris enim, quis pretium elit placerat id  Fusce egestas nisi vel ipsum vehicula facilisis In pulvinar imperdiet venenatis  Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec eu pulvinar lorem. Etiam vestibulum ligula quis nisl feugiat, consectetur placerat augue vestibulum  Nulla aliquam elit eu diam pharetra.
                                </p>
                            </div>
                            <div class="col-lg-5">
                                <p>
                                    Fusce egestas nisi vel ipsum vehicula facilisis. In pulvinar imperdiet venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec eu pulvinar lorem. Etiam vestibulum ligula quis nisl feugiat, consectetur placerat augue vestibulum.
                                </p>
                            </div>
                        </div>
                        <h3 class="mt-5">Finial Results Of the Project</h3>
                        <div class="row g-5">
                            <div class="col-lg-7">
                                <div class="list-items">
                                    <ul>
                                        <li><span>consectetur placerat augue vestibulum</span></li>
                                        <li><span>Mauris tincidunt a eget facilisis  Quisque</span></li>
                                        <li><span>Precision execution across all digital touchpoints</span></li>
                                    </ul>
                                    <ul>
                                        <li><span>adipiscing elit Etiam aliquam, enim vitae</span></li>
                                        <li><span>Donec at augue ante Nam posuere mauris</span></li>
                                        <li><span>quis pretium elit placerat id Fusce egestas</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="progress-area">
                                    <div class="progress-wrap">
                                        <div class="pro-items">
                                            <div class="pro-head">
                                                <h6 class="title">
                                                    Branding Design
                                                </h6>
                                                <span class="point">
                                                    86%
                                                </span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-value"></div>
                                            </div>
                                        </div>
                                        <div class="pro-items">
                                            <div class="pro-head">
                                                <h6 class="title">
                                                    Business
                                                </h6>
                                                <span class="point">
                                                    96%
                                                </span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-value style-two"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 mt-4">
                            <div class="col-md-6">
                                <div class="details-image">
                                    <img src="assets/img/case-studies/details-1.jpg" alt="img">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="details-image">
                                    <img src="assets/img/case-studies/details-2.jpg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-button d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-xxl-4 gap-3 gap-2">
                            <button class="cmn-prev cmn-border d-center">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <span class="fw-bold white-clr previus-text text-capitalize">
                                previous
                            </span>
                        </div>
                        <div class="d-flex align-items-center gap-xxl-4 gap-3 gap-2">
                            <span class="fw-bold white-clr previus-text text-capitalize">
                                Next
                            </span>
                            <button class="cmn-next cmn-border d-center">
                                <i class="fas fa-chevron-right"></i>
                            </button>
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