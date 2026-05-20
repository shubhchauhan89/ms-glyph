<!-- Top Bar Start -->
<div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <!-- language-->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/<?php echo htmlspecialchars($roww['favicon_logo']); ?>" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown"><!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div>
                    
                        <a class="nav-link" target="_blank" href="https://<?php echo $_SERVER['HTTP_HOST']; ?>"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i>
                        Home page</a>
                    <div class="dropdown-divider">

                    </div>
                    <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="hide-phone app-search">
                <form role="search" class=""><input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fas fa-search"></i></a>
                </form>
            </li>
        </ul>
        <div class="clearfix"></div>
    </nav>
</div>
<!-- Top Bar End -->