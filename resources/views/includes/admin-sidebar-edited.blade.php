<!-- Top Bar End -->
<!-- leftbar-tab-menu -->
<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="#" class="logo">
            <span>
                <img src="/admin/logo.png" width="80px"alt="logo-small" class="logo-sm">
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


                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('business') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Cost Calculator</span>
                        </a>


                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('companies.edit', 1) }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Company</span>
                        </a>


                    </li>



                    <li class="menu-label pt-0 mt-3">
                        <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small>
                        <span>Customer Enquires</span>
                    </li>



                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('customer.enquiry') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Enquires</span>
                        </a>


                    </li>

                    <li class="menu-label pt-0 mt-3">
                        <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small>
                        <span>Business Setup</span>
                    </li>


                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('business-setup.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Businees Setup</span>
                        </a>


                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('business-setup-details.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Business Setup Details</span>
                        </a>


                    </li>





                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('sub-business-setup.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Sub Business Setup</span>
                        </a>


                    </li>


                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('sub-business-setup-details.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Sub Business Setup Details</span>
                        </a>


                    </li>




                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('mini-sub-business-setup.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Mini Sub Business</span>
                        </a>


                    </li>


                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('mini-sub-business-setup-details.index') }}"
                            aria-expanded="false" aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Mini Sub business Detail</span>
                        </a>


                    </li>


                    <li class="menu-label pt-0 mt-3">
                        <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small>
                        <span>Services</span>
                    </li>


                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('service.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Service</span>
                        </a>


                    </li>



                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('service-details.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Service Details</span>
                        </a>


                    </li>



                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('sub-service.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Sub Service</span>
                        </a>


                    </li>


                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('sub-service-details.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Sub Service Details</span>
                        </a>


                    </li>






                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('mini-sub-service.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Mini Sub Service</span>
                        </a>


                    </li>


                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('mini-sub-service-details.index') }}"
                            aria-expanded="false" aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Mini Sub Services Detail</span>
                        </a>


                    </li>


                    <li class="menu-label pt-0 mt-3">
                        <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small>
                        <span>Blogs</span>
                    </li>



                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('blog.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Blogs</span>
                        </a>


                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('blog-details.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Blog detailss</span>
                        </a>


                    </li>
                    <li class="menu-label pt-0 mt-3">
                        <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small>
                        <span>Meta Section</span>
                    </li>



                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('static.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Static meta</span>
                        </a>


                    </li>

                    <li class="menu-label pt-0 mt-3">
                        <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small>
                        <span>Country section</span>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('country.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Countrys</span>
                        </a>


                    </li>


                    <li class="menu-label pt-0 mt-3">
                        <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small>
                        <span>Cost Calculator</span>
                    </li>



                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('question.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Qustions</span>
                        </a>


                    </li>


                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('option.index') }}" aria-expanded="false"
                            aria-controls="sidebarElements">
                            <i class="iconoir-book menu-icon"></i>
                            <span>Options</span>
                        </a>


                    </li>




                </ul><!--end navbar-nav--->

            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->
</div><!--end startbar-->
<div class="startbar-overlay d-print-none"></div>
<!-- end leftbar-tab-menu-->
