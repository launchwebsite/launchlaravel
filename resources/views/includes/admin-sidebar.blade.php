<!-- SideBar -->

<!-- Top Bar End -->
<!-- leftbar-tab-menu -->
<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="{{ route('home') }}" class="logo">
            <span>
                <img src="/storage/admin/logo.png" alt="logo-small" class="logo-sm" id="brandLogo">
            </span>
        </a>
    </div>

    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu">
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <!-- Navigation -->
                <ul class="navbar-nav mb-auto w-100">
                    <li class="menu-label pt-0 mt-0">
                        <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small>
                        <span>Main Menu</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('page.dashboard') }}" aria-expanded="false"
                            aria-controls="sidebarDashboards">
                            <i class="iconoir-home-simple menu-icon"></i>
                            <span>Dashboard</span>
                        </a>
                    </li><!--end nav-item-->

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.vendor') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Vendors</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin-category') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Category</span>
                        </a>
                    </li>


                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('attributes.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Attributes</span>
                        </a>
                    </li>

                </ul><!--end navbar-nav--->

            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->
</div><!--end startbar-->
<div class="startbar-overlay d-print-none"></div>
<!-- end leftbar-tab-menu-->
