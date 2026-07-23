<!--=====================================
                    SIDEBAR PART START
        =======================================-->
<aside class="sidebar-part">
    <div class="sidebar-body">
        <div class="sidebar-header">
            <a class='sidebar-logo' href='{{ route('home') }}'><img src="/storage/images/logo.png" alt="logo"></a>
            <button class="sidebar-cross"><i class="fas fa-times"></i></button>
        </div>
        <div class="sidebar-content">

            <div class="sidebar-menu">
                <ul class="nav nav-tabs">
                    <li><a href="#main-menu" class="nav-link active" data-bs-toggle="tab">Main Menu</a></li>

                </ul>

                <div class="tab-pane active" id="main-menu">
                    <ul class="navbar-list">
                        <li class="navbar-item"><a class='navbar-link' href='{{ route('home') }}'>Home</a></li>
                        <li class="navbar-item navbar-dropdown">
                            <a class="navbar-link" href="#">
                                <span>Categories</span>
                                <i class="fas fa-plus"></i>
                            </a>
                            <ul class="dropdown-list">
                                <li><a class='dropdown-link' href='{{ route('categorylist') }}'>category list</a></li>
                                <li><a class='dropdown-link' href='{{ route('categorydetails') }}'>category details</a></li>
                            </ul>
                        </li>
                        <li class="navbar-item"><a class='navbar-link' href='{{ route('jobopening') }}'>Job Opening</a></li>
                        <li class="navbar-item"><a class='navbar-link' href='{{ route('contact') }}'>Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="sidebar-footer">
                <p>All Rights Reserved By <a href="https://launchincs.com/">Launch INCS</a></p>
                <p>Developed By <a href="https://ethqan.com/">Ethqan Technologies</a></p>
            </div>
        </div>
    </div>
</aside>
<!--=====================================
                    SIDEBAR PART END
        =======================================-->

<!--=====================================
                    MOBILE-NAV PART START
        =======================================-->
<!-- <nav class="mobile-nav">
            <div class="container">
                <div class="mobile-group">
                    <a class='mobile-widget' href='index.php'>
                        <i class="fas fa-home"></i>
                        <span>home</span>
                    </a>
                    <a class='mobile-widget' href='user-form.html'>
                        <i class="fas fa-user"></i>
                        <span>join me</span>
                    </a>
                    <a class='mobile-widget plus-btn' href='ad-post.php'>
                        <i class="fas fa-plus"></i>
                        <span>Ad Post</span>
                    </a>
                    <a class='mobile-widget' href='notification.html'>
                        <i class="fas fa-bell"></i>
                        <span>notify</span>
                        <sup>0</sup>
                    </a>
                    <a class='mobile-widget' href='message.html'>
                        <i class="fas fa-envelope"></i>
                        <span>message</span>
                        <sup>0</sup>
                    </a>
                </div>
            </div>
        </nav> -->
<!--=====================================
                    MOBILE-NAV PART END
        =======================================-->
