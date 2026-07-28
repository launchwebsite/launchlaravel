  <div class="topbar d-print-none">
      <div class="container-xxl">
          <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">


              <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                  <li>
                      <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                          <i class="iconoir-menu-scale"></i>
                      </button>
                  </li>
                  <li class="mx-3 welcome-text">
                      <h3 class="mb-0 fw-bold text-truncate">Hey, Vendor

                      </h3>
                      <!-- <h6 class="mb-0 fw-normal text-muted text-truncate fs-14">Here's your overview this week.</h6> -->
                  </li>
              </ul>
              <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">

                  <li class="dropdown">
                      <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                          role="button" aria-haspopup="false" aria-expanded="false">
                          <img src="/vendor/assets/images/flags/us_flag.jpg" alt="" class="thumb-sm rounded-circle">
                      </a>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="#"><img src="/assets/images/flags/us_flag.jpg"
                                  alt="" height="15" class="me-2">English</a>
                          <a class="dropdown-item" href="#"><img src="/assets/images/flags/spain_flag.jpg"
                                  alt="" height="15" class="me-2">Spanish</a>
                          <a class="dropdown-item" href="#"><img src="/assets/images/flags/germany_flag.jpg"
                                  alt="" height="15" class="me-2">German</a>
                          <a class="dropdown-item" href="#"><img src="/assets/images/flags/french_flag.jpg"
                                  alt="" height="15" class="me-2">French</a>
                      </div>
                  </li><!--end topbar-language-->

                  <li class="topbar-item">
                      <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
                          <i class="icofont-moon dark-mode"></i>
                          <i class="icofont-sun light-mode"></i>
                      </a>
                  </li>







                  <div id="toastBox" style="position:fixed; top:20px; right:20px; z-index:9999; display:none;">
                      <div id="toastMessage"
                          style="background:rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) !important;; color:white; padding:12px 18px;
         border-radius:5px; box-shadow:0px 4px 8px rgba(0,0,0,0.2);">
                      </div>
                  </div>



                  <li class="dropdown topbar-item">
                      <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                          role="button" aria-haspopup="false" aria-expanded="false">
                          <img src="/vendor/assets/images/users/avatar-1.jpg" alt="" class="thumb-lg rounded-circle">
                      </a>
                      <div class="dropdown-menu dropdown-menu-end py-0">
                          <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                              <div class="flex-shrink-0">
                                  <img src="/vendor/assets/images/favicon.png" alt="" class="thumb-md rounded-circle">
                              </div>
                              <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                                  <h6 class="my-0 fw-medium text-dark fs-13">{{ Auth::user()->name ?? 'Guest' }}</h6>
                                  <small class="text-muted mb-0">
                                        Admin
                                  </small>

                              </div><!--end media-body-->
                          </div>
                          <div class="dropdown-divider mt-0"></div>
                          <small class="text-muted px-2 pb-1 d-block">Account</small>



                          <div class="dropdown-divider mb-0"></div>

                                  {{-- Admin logout --}}
                                  <a class="dropdown-item text-danger" href="#">
                                      <i class="las la-power-off fs-18 me-1 align-text-bottom"></i> Logout
                                  </a>



                      </div>
                  </li>
              </ul><!--end topbar-nav-->
          </nav>
          <!-- end navbar-->
      </div>
  </div>
