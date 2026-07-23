<!DOCTYPE html>
<html lang="en">

<head>
    <!--=====================================
                    META-TAG PART START
        =======================================-->
    <!-- REQUIRE META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- TEMPLATE META -->
    <meta name="name" content="Launch INCS">
    <meta name="type" content="Launch INCS">
    <meta name="title" content="Launch INCS">
    <meta name="keywords"
        content="Launch INCS, Launch INCS, ads, Launch INCS ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
    <!--=====================================
                    META-TAG PART END
        =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>Launch INCS</title>

    @vite(['resources/js/app.js', 'resources/css/app.css'])

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- FAVICON -->
    <link rel="icon" href="/storage/images/favicon.png">

    <!-- FONTS -->
    <link rel="stylesheet" href="/storage/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/storage/fonts/font-awesome/fontawesome.css">

    <!-- VENDOR -->
    <link rel="stylesheet" href="/storage/css/vendor/slick.min.css">
    <link rel="stylesheet" href="/storage/css/vendor/bootstrap.min.css">

    <!-- CUSTOM -->
    <link rel="stylesheet" href="/storage/css/custom/main.css">
    <link rel="stylesheet" href="/storage/css/custom/index.css">
    <link rel="stylesheet" href="/storage/css/custom/contact.css">
    <link rel="stylesheet" href="/storage/css/custom/user-form.css">
    <link rel="stylesheet" href="/storage/css/custom/ad-details.css">
    <!-- <link rel="stylesheet" href="/storage/css/custom/price.css"> -->
    <!--=====================================
                    CSS LINK PART END
        =======================================-->

</head>

<body>

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

    <!--=====================================
                    SIDEBAR PART START
        =======================================-->
    <aside class="sidebar-part">
        <div class="sidebar-body">
            <div class="sidebar-header">
                <a class='sidebar-logo' href='{{ route('home') }}'><img src="/storage/images/logo.png"
                        alt="logo"></a>
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
                                    <li><a class='dropdown-link' href='{{ route('categorylist') }}'>category list</a>
                                    </li>
                                    <li><a class='dropdown-link' href='{{ route('categorydetails') }}'>category
                                            details</a></li>
                                </ul>
                            </li>
                            <li class="navbar-item"><a class='navbar-link' href='{{ route('jobopening') }}'>Job
                                    Opening</a></li>
                            <li class="navbar-item"><a class='navbar-link' href='{{ route('contact') }}'>Contact</a>
                            </li>
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



    <!--=====================================
                    BANNER PART START
        =======================================-->
    <section class="banner-part">
        <div class="container">
            <div class="banner-content">
                <h1>Launch INCS - Buy, #Rent, #Book anything across the #UAE.</h1>
                <p>Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs
                    and more across Dubai, Abu Dhabi, Sharjah and the rest of the UAE.</p>
                <a class='btn btn-outline' href='ad-list-column3.php'>
                    <i class="fas fa-eye"></i>
                    <span>Show all ads</span>
                </a>
            </div>
        </div>
    </section>
    <!--=====================================
                    BANNER PART END
        =======================================-->


    <!--=====================================
                    SUGGEST PART START
        =======================================-->
    <section class="suggest-part">
        <div class="container">
            <div class="suggest-slider slider-arrow">
                <a class='suggest-card' href='ad-list-column3.php'>
                    <img src="images/suggest/properties.png" alt="car">
                    <h6>Properties</h6>
                    <p>(4,521) ads</p>
                </a>
                <a class='suggest-card' href='ad-list-column3.php'>
                    <img src="images/suggest/automobile.png" alt="furniture">
                    <h6>Cars</h6>
                    <p>(4,521) ads</p>
                </a>
                <a class='suggest-card' href='ad-list-column3.php'>
                    <img src="images/suggest/jobs.png" alt="house">
                    <h6>Jobs</h6>
                    <p>(4,521) ads</p>
                </a>
                <a class='suggest-card' href='ad-list-column3.php'>
                    <img src="images/suggest/furniture.png" alt="food">
                    <h6>Classifieds</h6>
                    <p>(4,521) ads</p>
                </a>
                <!-- <a class='suggest-card' href='ad-list-column3.php'>
                        <img src="images/suggest/electronics.png" alt="cycle">
                        <h6>electronics</h6>
                        <p>(4,521) ads</p>
                    </a>
                    <a class='suggest-card' href='ad-list-column3.php'>
                        <img src="images/suggest/" alt="clothes">
                        <h6>hospitality</h6>
                        <p>(4,521) ads</p>
                    </a>
                    <a class='suggest-card' href='ad-list-column3.php'>
                        <img src="images/suggest/gadgets.png" alt="computer">
                        <h6>gadgets</h6>
                        <p>(4,521) ads</p>
                    </a>
                    <a class='suggest-card' href='ad-list-column3.php'>
                        <img src="images/suggest/" alt="phone">
                        <h6>education</h6>
                        <p>(4,521) ads</p>
                    </a>
                    <a class='suggest-card' href='ad-list-column3.php'>
                        <img src="images/suggest/" alt="scooter">
                        <h6>software</h6>
                        <p>(4,521) ads</p>
                    </a>
                    <a class='suggest-card' href='ad-list-column3.php'>
                        <img src="images/suggest/food.png" alt="television">
                        <h6>food</h6>
                        <p>(4,521) ads</p>
                    </a>
                    <a class='suggest-card' href='ad-list-column3.php'>
                        <img src="images/suggest/services.png" alt="truck">
                        <h6>services</h6>
                        <p>(4,521) ads</p>
                    </a>
                    <a class='suggest-card' href='ad-list-column3.php'>
                        <img src="images/suggest/animals.png" alt="pet">
                        <h6>animals</h6>
                        <p>(4,521) ads</p>
                    </a> -->
            </div>
        </div>
    </section>
    <!--=====================================
                    SUGGEST PART END
        =======================================-->


    <!--=====================================
                    CATEGORY PART START
        =======================================-->
    <section class="section category-part top-categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Top Categories by <span class="greeny">Ads</span></h2>
                        <p>Explore the most popular categories UAE residents are buying, selling and renting right now.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card golden bluee">
                        <div class="category-head">
                            <img src="images/category/properties.jpg" alt="category">
                            <a href="category-details.php" class="category-content">
                                <h4>Properties</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list goldy">
                            <li><a href="ad-details-left.php">
                                    <h6>Apartments</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Villas</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Townhouses</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Penthouses</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Hotel Apartments</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card golden bluee">
                        <div class="category-head">
                            <img src="images/category/automobiles.jpg" alt="category">
                            <a href="category-details.php" class="category-content">
                                <h4>Cars</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list goldy">
                            <li><a href="ad-details-left.php">
                                    <h6>Sedan</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>SUV</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Pickup Trucks</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Luxury Cars</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Electric Cars</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card golden bluee">
                        <div class="category-head">
                            <img src="images/category/fashions.jpg" alt="category">
                            <a href="category-details.php" class="category-content">
                                <h4>Jobs</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list goldy">
                            <li><a href="ad-details-left.php">
                                    <h6>IT & Software</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Sales & Marketing</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Accounting & Finance</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Engineering</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Hospitality</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card golden bluee">
                        <div class="category-head">
                            <img src="images/category/gadgets.jpg" alt="category">
                            <a href="category-details.php" class="category-content">
                                <h4>Classifieds</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list goldy">
                            <li><a href="ad-details-left.php">
                                    <h6>Electronics</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Furniture</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Home Appliances</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Fashion & Beauty</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="ad-details-left.php">
                                    <h6>Sports & Fitness</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>

                <!-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="category-card">
                            <div class="category-head">
                                <img src="images/category/fashions.jpg" alt="category">
                                <a href="category-details.php" class="category-content">
                                    <h4>fashions</h4>
                                    <p>(3678)</p>
                                </a>
                            </div>
                            <ul class="category-list">
                                <li><a href="ad-details-left.php"><h6>jeans</h6><p>(34)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>underware</h6><p>(24)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>shirt</h6><p>(12)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>jacket</h6><p>(19)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>shorts</h6><p>(56)</p></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="category-card">
                            <div class="category-head">
                                <img src="images/category/motorbikes.jpg" alt="category">
                                <a href="category-details.php" class="category-content">
                                    <h4>motorbikes</h4>
                                    <p>(3678)</p>
                                </a>
                            </div>
                            <ul class="category-list">
                                <li><a href="ad-details-left.php"><h6>sports bike</h6><p>(34)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>cruiser</h6><p>(24)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>scooter</h6><p>(12)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>delivery bike</h6><p>(19)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>spare parts</h6><p>(56)</p></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="category-card">
                            <div class="category-head">
                                <img src="images/category/properties.jpg" alt="category">
                                <a href="category-details.php" class="category-content">
                                    <h4>properties</h4>
                                    <p>(3678)</p>
                                </a>
                            </div>
                            <ul class="category-list">
                                <li><a href="ad-details-left.php"><h6>apartments</h6><p>(34)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>villas</h6><p>(24)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>off-plan properties</h6><p>(12)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>office space</h6><p>(19)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>land for sale</h6><p>(56)</p></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="category-card">
                            <div class="category-head">
                                <img src="images/category/" alt="category">
                                <a href="category-details.php" class="category-content">
                                    <h4>automobiles</h4>
                                    <p>(3678)</p>
                                </a>
                            </div>
                            <ul class="category-list">
                                <li><a href="ad-details-left.php"><h6>sedans</h6><p>(34)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>SUVs</h6><p>(24)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>4x4 &amp; pickups</h6><p>(12)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>luxury cars</h6><p>(19)</p></a></li>
                                <li><a href="ad-details-left.php"><h6>auto parts</h6><p>(56)</p></a></li>
                            </ul>
                        </div>
                    </div> -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20">
                        <a class='btn btn-inline btn-green' href='category-list.php'>
                            <i class="fas fa-eye"></i>
                            <span>view all categories</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    CATEGORY PART END
        =======================================-->

    <!--=====================================
                    RECOMEND PART START
        =======================================-->
    <section class="section recomend-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Featured <span class="blue">Jobs</span></h2>
                        <p>Explore verified job opportunities from leading employers across the UAE. Find your next
                            career move today.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recomend-slider slider-arrow">
                        <div class="product-card jobbies">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/01.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-clipboard-check"></i>
                                        <span>recommend</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">Full Time</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="heart"><i class="fas fa-heart text-danger"></i><span class="text-white">264</span></li>

                                        <li class="rating"><i class="fas fa-star"></i><span  class="text-white">4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content bil-bil">
                                <ol class="breadcrumb product-category odyssey">
                                    <!-- <li><i class="fas fa-tags"></i></li> -->
                                    <!-- <li class="breadcrumb-item"><a href="ad-details-left.php">Luxury</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Duplex House</li> -->
                                </ol>
                                <h5 class="product-title blue-reccom">
                                    <a href='ad-details-left.php'>Digital Marketing Specialist</a>
                                </h5>
                                <div class="product-meta blue-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Sharjah</span>
                                    <span><i class="fas fa-clock"></i>Posted 1 day ago</span>
                                </div>
                                <div class="product-info blue-price">
                                    <h5 class="product-price panam">AED 5,000 - 8,000 / Month</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card jobbies">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/03.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-clipboard-check"></i>
                                        <span>recommend</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">Full Time</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="heart"><i class="fas fa-heart text-danger"></i><span class="text-white">264</span></li>

                                        <li class="rating"><i class="fas fa-star"></i><span  class="text-white">4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content bil-bil">
                                <ol class="breadcrumb product-category odyssey">
                                    <!-- <li><i class="fas fa-tags"></i></li> -->
                                    <!-- <li class="breadcrumb-item"><a href="ad-details-left.php">stationary</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">books</li> -->
                                </ol>
                                <h5 class="product-title blue-reccom">
                                    <a href='ad-details-left.php'>Senior PHP Laravel Developer</a>
                                </h5>
                                <div class="product-meta blue-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Dubai Internet City, Dubai</span>
                                    <!-- </div>
                                    <div class="product-meta blue-meta"> -->
                                    <span><i class="fas fa-clock"></i>Posted 2 hours ago</span>
                                </div>
                                <div class="product-info blue-price">
                                    <h5 class="product-price panam">AED 8,000 - 12,000 / Month</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card jobbies">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/10.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-clipboard-check"></i>
                                        <span>recommend</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge rent">Remote</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="heart"><i class="fas fa-heart text-danger"></i><span class="text-white">264</span></li>

                                        <li class="rating"><i class="fas fa-star"></i><span  class="text-white">4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content bil-bil">
                                <ol class="breadcrumb product-category odyssey">
                                    <!-- <li><i class="fas fa-tags"></i></li>
                                        <li class="breadcrumb-item"><a href="ad-details-left.php">automobile</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">private car</li> -->
                                </ol>
                                <h5 class="product-title blue-reccom">
                                    <a href='ad-details-left.php'>Frontend Developer (React.js)</a>
                                </h5>
                                <div class="product-meta blue-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Business Bay, Dubai</span>
                                    <span><i class="fas fa-clock"></i>Posted 5 hours ago</span>
                                </div>
                                <div class="product-info blue-price">
                                    <h5 class="product-price panam">AED 7,000 - 10,000 / Month</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card jobbies">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/09.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-clipboard-check"></i>
                                        <span>recommend</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">Full Time</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="heart"><i class="fas fa-heart text-danger"></i><span class="text-white">264</span></li>

                                        <li class="rating"><i class="fas fa-star"></i><span  class="text-white">4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content bil-bil">
                                <ol class="breadcrumb product-category odyssey">
                                    <!-- <li><i class="fas fa-tags"></i></li>
                                        <li class="breadcrumb-item"><a href="ad-details-left.php">animals</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">cat</li> -->
                                </ol>
                                <h5 class="product-title blue-reccom">
                                    <a href='ad-details-left.php'>AWS Cloud Engineer</a>
                                </h5>
                                <div class="product-meta blue-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Abu Dhabi</span>
                                    <span><i class="fas fa-clock"></i>Posted Today</span>
                                </div>
                                <div class="product-info blue-price">
                                    <h5 class="product-price panam">AED 10,000 - 15,000 / Month</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card jobbies">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/02.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-clipboard-check"></i>
                                        <span>recommend</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge booking">Hybrid</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="heart"><i class="fas fa-heart text-danger"></i><span class="text-white">264</span></li>

                                        <li class="rating"><i class="fas fa-star"></i><span  class="text-white">4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content bil-bil">
                                <ol class="breadcrumb product-category odyssey">
                                    <!-- <li><i class="fas fa-tags"></i></li>
                                        <li class="breadcrumb-item"><a href="ad-details-left.php">fashion</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">shoes</li> -->
                                </ol>
                                <h5 class="product-title blue-reccom">
                                    <a href='ad-details-left.php'>UI / UX Designer</a>
                                </h5>
                                <div class="product-meta blue-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Dubai Marina</span>
                                    <span><i class="fas fa-clock"></i>Posted Yesterday</span>
                                </div>
                                <div class="product-info blue-price">
                                    <h5 class="product-price panam">AED 6,000 - 9,000 / Month</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-50">
                        <a class='btn btn-inline btn-greeny' href='ad-list-column3.php'>
                            <i class="fas fa-eye"></i>
                            <span>view all recommend</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    RECOMEND PART START
        =======================================-->


    <!--=====================================
                    TREND PART START
        =======================================-->
    <section class="section trend-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Popular Trending <span class="golddy">Ads</span></h2>
                        <p>See what other UAE buyers are searching for right now, updated in real time.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-8 col-xl-6">
                    <div class="product-card standard">
                        <div class="product-media">
                            <div class="product-img">
                                <img src="images/product/01.jpg" alt="product">
                            </div>
                            <!-- <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-bolt"></i>
                                    <span>trending</span>
                                </div> -->
                            <div class="product-type">
                                <span class="flat-badge booking">booking</span>
                            </div>
                            <!-- <ul class="product-action">
                                    <ul class="product-action">
                                        <li class="heart"><i class="fas fa-heart text-danger"></i><span class="text-white">264</span></li>

                                        <li class="rating"><i class="fas fa-star"></i><span  class="text-white">4.5/7</span></li>
                                    </ul>
                                </ul> -->
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="ad-details-left.php">property</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">house</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='ad-details-left.php'>Fully Furnished Townhouse Near Dubai Hills Mall</a>
                            </h5>
                            <div class="product-meta">
                                <span><i class="fas fa-map-marker-alt"></i>Dubai Hills Estate, Dubai</span>
                                <span><i class="fas fa-clock"></i>30 min ago</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">AED 950</h5>
                                <div class="product-btn">
                                    <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11 col-lg-8 col-xl-6">
                    <div class="product-card standard">
                        <div class="product-media">
                            <div class="product-img">
                                <img src="images/product/02.jpg" alt="product">
                            </div>
                            <!-- <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-bolt"></i>
                                    <span>trending</span>
                                </div> -->
                            <div class="product-type">
                                <span class="flat-badge sale">sale</span>
                            </div>
                            <!-- <ul class="product-action">
                                    <li class="heart"><i class="fas fa-heart text-danger"></i><span class="text-white">264</span></li>

                                        <li class="rating"><i class="fas fa-star"></i><span  class="text-white">4.5/7</span></li>
                                </ul> -->
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="ad-details-left.php">fashion</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">shoes</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='ad-details-left.php'>Limited Edition Running Shoes - Never Worn</a>
                            </h5>
                            <div class="product-meta">
                                <span><i class="fas fa-map-marker-alt"></i>Al Barsha, Dubai</span>
                                <span><i class="fas fa-clock"></i>30 min ago</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">AED 450</h5>
                                <div class="product-btn">
                                    <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11 col-lg-8 col-xl-6">
                    <div class="product-card standard">
                        <div class="product-media">
                            <div class="product-img">
                                <img src="images/product/03.jpg" alt="product">
                            </div>
                            <!-- <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-bolt"></i>
                                    <span>trending</span>
                                </div> -->
                            <div class="product-type">
                                <span class="flat-badge sale">sale</span>
                            </div>
                            <!-- <ul class="product-action">
                                      <li class="heart"><i class="fas fa-heart text-danger"></i><span class="text-white">264</span></li>

                                        <li class="rating"><i class="fas fa-star"></i><span  class="text-white">4.5/7</span></li>
                                </ul> -->
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="ad-details-left.php">stationary</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">book</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='ad-details-left.php'>UAE Labour Law Guidebook - Latest Edition</a>
                            </h5>
                            <div class="product-meta">
                                <span><i class="fas fa-map-marker-alt"></i>Al Qusais, Dubai</span>
                                <span><i class="fas fa-clock"></i>30 min ago</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">AED 90</h5>
                                <div class="product-btn">
                                    <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11 col-lg-8 col-xl-6">
                    <div class="product-card standard">
                        <div class="product-media">
                            <div class="product-img">
                                <img src="images/product/04.jpg" alt="product">
                            </div>
                            <!-- <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-bolt"></i>
                                    <span>trending</span>
                                </div> -->
                            <div class="product-type">
                                <span class="flat-badge sale">sale</span>
                            </div>
                            <!-- <ul class="product-action">
                                    <li class="heart"><i class="fas fa-heart text-danger"></i><span class="text-white">264</span></li>

                                        <li class="rating"><i class="fas fa-star"></i><span  class="text-white">4.5/7</span></li>
                                </ul> -->
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="ad-details-left.php">electronics</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">television</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='ad-details-left.php'>65-inch Smart TV - Barely Used, Full HD</a>
                            </h5>
                            <div class="product-meta">
                                <span><i class="fas fa-map-marker-alt"></i>Mirdif, Dubai</span>
                                <span><i class="fas fa-clock"></i>30 min ago</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">AED 2,780</h5>
                                <div class="product-btn">
                                    <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11 col-lg-8 col-xl-6">
                    <div class="product-card standard">
                        <div class="product-media">
                            <div class="product-img">
                                <img src="images/product/05.jpg" alt="product">
                            </div>
                            <!-- <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-bolt"></i>
                                    <span>trending</span>
                                </div> -->
                            <div class="product-type">
                                <span class="flat-badge sale">sale</span>
                            </div>
                            <!-- <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                            <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                            <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul> -->
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="ad-details-left.php">gadget</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">headphone</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='ad-details-left.php'>Noise Cancelling Wireless Headphones, Sealed Box</a>
                            </h5>
                            <div class="product-meta">
                                <span><i class="fas fa-map-marker-alt"></i>Business Bay, Dubai</span>
                                <span><i class="fas fa-clock"></i>30 min ago</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">AED 900</h5>
                                <div class="product-btn">
                                    <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11 col-lg-8 col-xl-6">
                    <div class="product-card standard">
                        <div class="product-media">
                            <div class="product-img">
                                <img src="images/product/06.jpg" alt="product">
                            </div>
                            <!-- <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-bolt"></i>
                                    <span>trending</span>
                                </div> -->
                            <div class="product-type">
                                <span class="flat-badge rent">rent</span>
                            </div>
                            <!-- <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                            <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                            <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul> -->
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="ad-details-left.php">automobile</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">cycle</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='ad-details-left.php'>Mountain Bike for Rent - Weekend Trail Ready</a>
                            </h5>
                            <div class="product-meta">
                                <span><i class="fas fa-map-marker-alt"></i>Al Qudra, Dubai</span>
                                <span><i class="fas fa-clock"></i>30 min ago</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">AED 65</h5>
                                <div class="product-btn">
                                    <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                    <button type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20">
                        <a class='btn btn-inline' href='ad-list-column3.php'>
                            <i class="fas fa-eye"></i>
                            <span>view all trend</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    TREND PART END
        =======================================-->


    <!--=====================================
                    NICHE PART START
        =======================================-->
    <section class="section niche-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Browse Our Top <span class="golddy">Niche</span></h2>
                        <p>Explore top-rated listings, our most active advertisers, and the ads getting the most
                            attention across the UAE.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="niche-nav">
                        <ul class="nav nav-tabs">
                            <li><a href="#ratings" class="nav-link active" data-bs-toggle="tab">top ratings</a></li>
                            <li><a href="#advertiser" class="nav-link" data-bs-toggle="tab">top advertiser</a></li>
                            <li><a href="#engaged" class="nav-link" data-bs-toggle="tab">top engaged</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane active" id="ratings">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/07.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge booking">booking</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">resort</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>All-Inclusive Weekend at a Ras Al Khaimah Beach
                                        Resort</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Marjan Island, RAK</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 3,900<span>/per week</span></h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/08.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">mobile</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>iPhone 15 Pro Max, 256GB - Sealed with Warranty</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Rigga, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 4,200</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/09.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">animal</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">cat</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Friendly Persian Cat Looking for a New Home</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Jumeirah, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 2,100</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/10.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge rent">rent</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">private car</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Toyota Camry 2023 for Monthly Rental</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Deira, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 2,800</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/11.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge booking">booking</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Duplex house</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Sea View Penthouse in JBR - Short Stay</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Jumeirah Beach, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 3,600</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/13.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">electronics</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">laptop</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>MacBook Pro M3, 16-inch - Under Warranty</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Silicon Oasis, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 6,900</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/14.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge rent">rent</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">bike</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Yamaha Delivery Bike Available for Daily Hire</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Quoz, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 85</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/15.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">camera</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Sony Mirrorless Camera Kit with Two Lenses</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Nahda, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 4,500</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Rating ads -->

            <div class="tab-pane " id="advertiser">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/08.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">mobile</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Samsung Galaxy S24 Ultra - Like New</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Rigga, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 4,200</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/07.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge booking">booking</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">resort</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>All-Inclusive Weekend at a Ras Al Khaimah Beach
                                        Resort</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Marjan Island, RAK</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 3,900</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/10.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge rent">rent</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">private car</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Toyota Camry 2023 for Monthly Rental</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Deira, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 2,800</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/09.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">animal</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">cat</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Friendly Persian Cat Looking for a New Home</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Jumeirah, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 2,100</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/13.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">electronics</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">laptop</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>MacBook Pro M3, 16-inch - Under Warranty</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Silicon Oasis, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 6,900</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/11.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge booking">booking</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Duplex house</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Sea View Penthouse in JBR - Short Stay</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Jumeirah Beach, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 3,600</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/15.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">camera</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Sony Mirrorless Camera Kit with Two Lenses</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Nahda, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 4,500</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/14.jpg" alt="product">
                                </div>
                                <!-- <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-fire"></i>
                                        <span>top niche</span>
                                    </div> -->
                                <div class="product-type">
                                    <span class="flat-badge rent">rent</span>
                                </div>
                                <!-- <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li> -->
                                <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                <!-- <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                    </ul> -->
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">bike</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Yamaha Delivery Bike Available for Daily Hire</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Quoz, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 85</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Advertiser ads -->

            <div class="tab-pane" id="engaged">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/15.jpg" alt="product">
                                </div>
                                <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-fire"></i>
                                    <span>top niche</span>
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                    <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">camera</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Sony Mirrorless Camera Kit with Two Lenses</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Nahda, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 4,500</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/07.jpg" alt="product">
                                </div>
                                <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-fire"></i>
                                    <span>top niche</span>
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge booking">booking</span>
                                </div>
                                <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                    <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">resort</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>All-Inclusive Weekend at a Ras Al Khaimah Beach
                                        Resort</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Marjan Island, RAK</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 3,900</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/09.jpg" alt="product">
                                </div>
                                <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-fire"></i>
                                    <span>top niche</span>
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                    <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">animal</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">cat</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Friendly Persian Cat Looking for a New Home</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Jumeirah, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 2,100</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/10.jpg" alt="product">
                                </div>
                                <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-fire"></i>
                                    <span>top niche</span>
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge rent">rent</span>
                                </div>
                                <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                    <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">private car</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Toyota Camry 2023 for Monthly Rental</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Deira, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 2,800</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/08.jpg" alt="product">
                                </div>
                                <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-fire"></i>
                                    <span>top niche</span>
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                    <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">mobile</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Samsung Galaxy S24 Ultra - Like New</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Rigga, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 4,200</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/13.jpg" alt="product">
                                </div>
                                <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-fire"></i>
                                    <span>top niche</span>
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge sale">sale</span>
                                </div>
                                <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                    <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">electronics</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">laptop</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>MacBook Pro M3, 16-inch - Under Warranty</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Silicon Oasis, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 6,900</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/14.jpg" alt="product">
                                </div>
                                <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-fire"></i>
                                    <span>top niche</span>
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge rent">rent</span>
                                </div>
                                <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                    <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">bike</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Yamaha Delivery Bike Available for Daily Hire</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Al Quoz, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 85</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="images/product/11.jpg" alt="product">
                                </div>
                                <div class="cross-vertical-badge product-badge">
                                    <i class="fas fa-fire"></i>
                                    <span>top niche</span>
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge booking">booking</span>
                                </div>
                                <ul class="product-action">
                                    <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                    <!-- <li class="click"><i class="fas fa-mouse"></i><span>134</span></li> -->
                                    <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item"><a href="ad-details-left.php">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Duplex house</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='ad-details-left.php'>Sea View Penthouse in JBR - Short Stay</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Jumeirah Beach, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 3,600</h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Engaged ads -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20">
                        <a class='btn btn-inline' href='ad-list-column3.php'>
                            <i class="fas fa-eye"></i>
                            <span>view all ads</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    NICHE PART END
        =======================================-->


    <!--=====================================
                    CITY PART START
        =======================================-->
    <section class="section city-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Top Emirates & Cities by <span class="golddy">Ads</span></h2>
                        <p>Browse listings across the UAE - from bustling Dubai neighborhoods to Abu Dhabi's business
                            districts and beyond.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <a class='city-card' href='ad-list-column3.php'
                        style='background: url(images/cities/01.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Dubai</h4>
                            <p>(1,240) ads</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a class='city-card' href='ad-list-column3.php'
                        style='background: url(images/cities/02.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Abu Dhabi</h4>
                            <p>(860) ads</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-5">
                    <a class='city-card' href='ad-list-column3.php'
                        style='background: url(images/cities/03.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Sharjah</h4>
                            <p>(420) ads</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-5">
                    <a class='city-card' href='ad-list-column3.php'
                        style='background: url(images/cities/04.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Ajman</h4>
                            <p>(180) ads</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a class='city-card' href='ad-list-column3.php'
                        style='background: url(images/cities/05.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Ras Al Khaimah</h4>
                            <p>(150) ads</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <a class='city-card' href='ad-list-column3.php'
                        style='background: url(images/cities/06.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Fujairah</h4>
                            <p>(95) ads</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20">
                        <a class='btn btn-inline' href='category-details.php'>
                            <i class="fas fa-eye"></i>
                            <span>view all Cities</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    CITY PART END
        =======================================-->





    <!--=====================================
                    INTRO PART START
        =======================================-->
    <section class="intro-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Do you have something to advertise?</h2>
                        <p>Reach thousands of buyers across the UAE with Launch INCS - the region's trusted marketplace
                            for property, automobiles, jobs and more.</p>
                        <!-- <a class='btn btn-outline' href='ad-post.php'>
                                <i class="fas fa-plus-circle"></i>
                                <span>post your ad</span>
                            </a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    INTRO PART END
        =======================================-->


    <!--=====================================
                     PRICE PART START
        =======================================-->
    <section class="inner-section price-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Best Reliable Pricing Plans</h2>
                        <p>Choose the plan that fits your business needs and start reaching customers across the UAE
                            today.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="price-card price-active">
                        <div class="price-head">
                            <i class="flaticon-bicycle"></i>
                            <h3>AED 0</h3>
                            <h4>Basic Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="disable">
                                <i class="fas fa-times"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="disable">
                                <i class="fas fa-times"></i>
                                <p>Access to limited features</p>
                            </li>
                        </ul>
                        <div class="price-btn">
                            <a class='btn btn-inline btn-gold' href='user-form.php'>
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Register Now</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="price-card price-active">
                        <div class="price-head">
                            <i class="flaticon-car-wash"></i>
                            <h3>AED 85</h3>
                            <h4>Standard Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="disable">
                                <i class="fas fa-times"></i>
                                <p>Access to limited features</p>
                            </li>
                        </ul>
                        <div class="price-btn">
                            <a class='btn btn-inline btn-gold' href='user-form.php'>
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Register Now</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="price-card price-active">
                        <div class="price-head price-active">
                            <i class="flaticon-airplane"></i>
                            <h3>AED 180</h3>
                            <h4>Premium Plan</h4>
                        </div>
                        <ul class="price-list">
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                            <li class="able">
                                <i class="fas fa-plus"></i>
                                <p>Access to limited features</p>
                            </li>
                        </ul>
                        <div class="price-btn">
                            <a class='btn btn-inline btn-gold' href='user-form.php'>
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Register Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                     PRICE PART END
        =======================================-->

    @include('includes.footer')

    <div class="whatsapp">
        <a href="https://wa.me/971564527879 " text="Hello, I'm interested." target="_blank">
            <img src="/whatsapp.gif" alt="Hello, I'm interested.">
        </a>
    </div>

    <!-- Call -->
    <div class="call">
        <a href="tel:+971564527879">
            <img src="/call.gif" alt="Call">
        </a>
    </div>

    <!--=====================================
                    JS LINK PART START
        =======================================-->
    <!-- VENDOR -->
    <script src="/storage/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/storage/js/vendor/popper.min.js"></script>
    <script src="/storage/js/vendor/bootstrap.min.js"></script>
    <script src="/storage/js/vendor/slick.min.js"></script>

    <!-- CUSTOM -->
    <script src="/storage/js/custom/slick.js"></script>
    <script src="/storage/js/custom/main.js"></script>
    <!--=====================================
                    JS LINK PART END
        =======================================-->

</body>

</html>
