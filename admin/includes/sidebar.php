<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect"><i
            class="ion-close"></i></button><!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center bg-logo">
            <a href="index.php" class="logo"><img src="assets/images/<?php echo htmlspecialchars($roww["header_logo"]); ?>" height="45px" alt="logo"></a> 
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class="waves-effect"><i class="dripicons-device-desktop"></i>
                        <span>Dashboard</span></a>
                </li>
                <li><a href="setting.php" class="waves-effect"><i class="mdi mdi-settings"></i><span>
                            Setting</span></a></li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-jewel"></i>
                        <span>Service </span>
                        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="add-service-category.php">Add Service Category</a></li>
                        <li><a href="add-service.php">Add Service</a></li>
                        <li><a href="view-services.php">View Service</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="dripicons-blog"></i>
                        <span> Blog </span>
                        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="add-blog-category.php">Add Blog Category</a></li>
                        <li><a href="add-blog.php">Add Blog</a></li>
                        <li><a href="view-blog.php">View Blog</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="javascript:void(0);" class="waves-effect"><i
                            class="mdi mdi-cart"></i><span> Product </span><span class="float-right"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-product-category.php">Add Product Category</a></li>
                        <li><a href="add-product.php">Add Product</a></li>
                        <li><a href="view-product.php">View Product</a></li>
                    </ul>
                </li>
                <li class="has_sub"><a href="javascript:void(0);" class="waves-effect"><i
                            class=" mdi mdi-dots-vertical"></i>
                        <span>Others</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="slider.php">Slider</a></li>
                        <li><a href="banner.php">Banner</a></li>
                        <li><a href="add-testimonial.php">Testmonials</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div><!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->