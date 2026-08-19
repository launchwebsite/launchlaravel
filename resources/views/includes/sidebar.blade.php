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
                <p>All Rights Reserved By <a href="https://launchincs.com/">Launch</a></p>
                <p>Developed By <a href="https://ethqan.com/">Ethqan Technologies</a></p>
            </div>
        </div>
    </div>
</aside>


