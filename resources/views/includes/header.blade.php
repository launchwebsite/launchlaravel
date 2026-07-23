<!--=====================================
                    HEADER PART START
        =======================================-->
<header class="header-part"style="background-color:black;">
    <div class="container">
        <div class="header-content">
            <div class="header-left">
                <button type="button" class="header-widget sidebar-btn">
                    <i class="fas fa-align-left"></i>
                </button>
                <a class='header-logo' href='{{ route('home') }}'>
                    <img src="/storage/images/logo.png" alt="logo">
                </a>

                <button type="button" class="header-widget search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <form class="header-form">
                <div class="header-search">
                    <button type="submit" title="Search Submit "><i class="fas fa-search"></i></button>
                    <input type="text" placeholder="Search, Whatever you needs...">
                    <button type="button" title="Search Option" class="option-btn"><i
                            class="fas fa-sliders-h"></i></button>
                </div>
                <div class="header-option">
                    <div class="option-grid">
                        <div class="option-group"><input type="text" placeholder="City"></div>
                        <div class="option-group"><input type="text" placeholder="State"></div>
                        <div class="option-group"><input type="text" placeholder="Min Price"></div>
                        <div class="option-group"><input type="text" placeholder="Max Price"></div>
                        <button type="submit"><i class="fas fa-search"></i><span>Search</span></button>
                    </div>
                </div>
            </form>
            <div class="header-right">
                <a class='header-widget header-user' href='{{ route('user') }}'>
                    <img src="/storage/images/user.png" alt="user">
                    <span>join me</span>
                </a>
                <!-- <ul class="social-icons">
                            <li class="face"><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li class="insta"><a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a></li>
                            <li class="x"><a href="https://x.com/"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li class="link"><a href="www.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul> -->
                <a class='btn btn-inline post-btn' href='{{ route('adpost') }}'>
                    <i class="fas fa-plus-circle"></i>
                    <span>post your ad</span>
                </a>
            </div>
        </div>
    </div>
</header>
<!--=====================================
                    HEADER PART END
        =======================================-->
