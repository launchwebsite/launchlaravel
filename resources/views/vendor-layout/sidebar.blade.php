<!-- Top Bar End -->
<!-- leftbar-tab-menu -->
<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="#" class="logo">
            <span>
                <img src="/vendor/logo.png" width="80px"alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                {{-- <img src="/assets/images/logo-light.png" alt="logo-large" class="logo-lg logo-light"> --}}
                {{-- <img src="/assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark"> --}}
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
                        <a class="nav-link" href="{{ route('dashboard') }}" aria-expanded="false"
                            aria-controls="sidebarDashboards">
                            <i class="iconoir-home-simple menu-icon"></i>
                            <span>Dashboards</span>
                        </a>

                    </li><!--end nav-item-->







                </ul><!--end navbar-nav--->

            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->
</div><!--end startbar-->
<div class="startbar-overlay d-print-none"></div>
<!-- end leftbar-tab-menu-->
