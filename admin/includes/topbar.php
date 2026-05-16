<!-- Top Bar Start -->
<div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0" style="display: flex; align-items: center; height: 70px;">
            <li class="list-inline-item mr-3">
                <a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>" target="_blank" class="btn btn-sm btn-outline" style="border: 1px solid var(--navy); color: var(--navy); font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; padding: 6px 15px;">View Live Site</a>
            </li>
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false" style="display: flex; align-items: center;">
                    <span style="color: var(--navy); font-weight: 600; font-size: 13px; margin-right: 8px;">Lead Architect</span>
                    <i class="mdi mdi-chevron-down" style="color: var(--slate-gray);"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div>
                    <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0" style="display: flex; align-items: center; height: 70px;">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect" style="color: var(--navy); background: transparent;">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="hide-phone app-search" style="margin-left: 20px;">
                <span style="font-weight: 500; color: var(--slate-gray); font-size: 14px; letter-spacing: 0.5px;">Studio <span style="margin: 0 8px;">&gt;</span> <span style="color: var(--navy);">Manage Insights</span></span>
            </li>
        </ul>
        <div class="clearfix"></div>
    </nav>
</div>
<!-- Top Bar End -->