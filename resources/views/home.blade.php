@extends('layouts.layout')
@section('content')
    @include('includes.header')

    @include('includes.sidebar')

    <!--=====================================
                                        BANNER PART START
                            =======================================-->
    <section class="banner-part">
        <div class="container">
            <div class="banner-content">
                <h1>Launch INCS - Buy, #Rent, #Book anything across the #UAE.</h1>
                <p>Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs
                    and more across Dubai, Abu Dhabi, Sharjah and the rest of the UAE.</p>
                <a class='btn btn-outline' href='{{ route('adlist3') }}'>
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
                @foreach ($category as $item)
                    <a class='suggest-card' href='{{ route('adlist3') }}'>
                        <img src="/storage/uploads/categories/{{ $item->CT_Img }}" alt="{{ $item->CT_Name }}"
                            style="border-radius: 20px">
                        <h6>{{ $item->CT_Name }}</h6>
                        <p>({{ $item->products_count }}) ads</p>
                    </a>
                @endforeach
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
                        <p>
                            Explore the most popular categories UAE residents are buying, selling and renting right now.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($categories as $item)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="category-card golden bluee">
                            <div class="category-head">
                                <img src="/storage/uploads/categories/{{ $item->CT_Img }}" alt="category">
                                <a href="{{ route('categorydetails', $item->CT_Id) }}" class="category-content">
                                    <h4>{{ $item->CT_Name }}</h4>
                                    <p>({{ $item->products_count }})</p>
                                </a>
                            </div>
                            <ul class="category-list goldy">
                                @foreach ($item->subcategories as $subcategory)
                                    <li><a href="{{ route('addetails', $subcategory->SC_Id) }}">
                                            <h6>{{ $subcategory->SC_Name }}</h6>
                                            <p>({{ $subcategory->products_count }})</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20">
                        <a class='btn btn-inline btn-green' href='{{ route('categorylist') }}'>
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
                                    <img src="/storage/images/product/01.jpg" alt="product">
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
                                    <!-- <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Luxury</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Duplex House</li> -->
                                </ol>
                                <h5 class="product-title blue-reccom">
                                    <a href='{{ route('addetails') }}'>Digital Marketing Specialist</a>
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
                                    <img src="/storage/images/product/03.jpg" alt="product">
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
                                    <!-- <li class="breadcrumb-item"><a href="{{ route('addetails') }}">stationary</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">books</li> -->
                                </ol>
                                <h5 class="product-title blue-reccom">
                                    <a href='{{ route('addetails') }}'>Senior PHP Laravel Developer</a>
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
                                    <img src="/storage/images/product/10.jpg" alt="product">
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
                                                            <li class="breadcrumb-item"><a href="{{ route('addetails') }}">automobile</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">private car</li> -->
                                </ol>
                                <h5 class="product-title blue-reccom">
                                    <a href='{{ route('addetails') }}'>Frontend Developer (React.js)</a>
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
                                    <img src="/storage/images/product/09.jpg" alt="product">
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
                                                            <li class="breadcrumb-item"><a href="{{ route('addetails') }}">animals</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">cat</li> -->
                                </ol>
                                <h5 class="product-title blue-reccom">
                                    <a href='{{ route('addetails') }}'>AWS Cloud Engineer</a>
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
                                    <img src="/storage/images/product/02.jpg" alt="product">
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
                                                            <li class="breadcrumb-item"><a href="{{ route('addetails') }}">fashion</a></li> -->
                                    <!-- <li class="breadcrumb-item active" aria-current="page">shoes</li> -->
                                </ol>
                                <h5 class="product-title blue-reccom">
                                    <a href='{{ route('addetails') }}'>UI / UX Designer</a>
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
                        <a class='btn btn-inline btn-greeny' href='{{ route('adlist3') }}'>
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
                                <img src="/storage/images/product/01.jpg" alt="product">
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
                                <li class="breadcrumb-item"><a href="{{ route('addetails') }}">property</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">house</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='{{ route('addetails') }}'>Fully Furnished Townhouse Near Dubai Hills Mall</a>
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
                                <img src="/storage/images/product/02.jpg" alt="product">
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
                                <li class="breadcrumb-item"><a href="{{ route('addetails') }}">fashion</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">shoes</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='{{ route('addetails') }}'>Limited Edition Running Shoes - Never Worn</a>
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
                                <img src="/storage/images/product/03.jpg" alt="product">
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
                                <li class="breadcrumb-item"><a href="{{ route('addetails') }}">stationary</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">book</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='{{ route('addetails') }}'>UAE Labour Law Guidebook - Latest Edition</a>
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
                                <img src="/storage/images/product/04.jpg" alt="product">
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
                                <li class="breadcrumb-item"><a href="{{ route('addetails') }}">electronics</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">television</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='{{ route('addetails') }}'>65-inch Smart TV - Barely Used, Full HD</a>
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
                                <img src="/storage/images/product/05.jpg" alt="product">
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
                                <li class="breadcrumb-item"><a href="{{ route('addetails') }}">gadget</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">headphone</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='{{ route('addetails') }}'>Noise Cancelling Wireless Headphones, Sealed Box</a>
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
                                <img src="/storage/images/product/06.jpg" alt="product">
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
                                <li class="breadcrumb-item"><a href="{{ route('addetails') }}">automobile</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">cycle</li> -->
                            </ol>
                            <h5 class="product-title">
                                <a href='{{ route('addetails') }}'>Mountain Bike for Rent - Weekend Trail Ready</a>
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
                        <a class='btn btn-inline' href='{{ route('adlist3') }}'>
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
                                    <img src="/storage/images/product/07.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">resort</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>All-Inclusive Weekend at a Ras Al Khaimah Beach
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
                                    <img src="/storage/images/product/08.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">mobile</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>iPhone 15 Pro Max, 256GB - Sealed with Warranty</a>
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
                                    <img src="/storage/images/product/09.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">animal</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">cat</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Friendly Persian Cat Looking for a New Home</a>
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
                                    <img src="/storage/images/product/10.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">private car</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Toyota Camry 2023 for Monthly Rental</a>
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
                                    <img src="/storage/images/product/11.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Duplex house</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Sea View Penthouse in JBR - Short Stay</a>
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
                                    <img src="/storage/images/product/13.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">electronics</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">laptop</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>MacBook Pro M3, 16-inch - Under Warranty</a>
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
                                    <img src="/storage/images/product/14.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">bike</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Yamaha Delivery Bike Available for Daily Hire</a>
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
                                    <img src="/storage/images/product/15.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">camera</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Sony Mirrorless Camera Kit with Two Lenses</a>
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
                                    <img src="/storage/images/product/08.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">mobile</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Samsung Galaxy S24 Ultra - Like New</a>
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
                                    <img src="/storage/images/product/07.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">resort</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>All-Inclusive Weekend at a Ras Al Khaimah Beach
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
                                    <img src="/storage/images/product/10.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">private car</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Toyota Camry 2023 for Monthly Rental</a>
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
                                    <img src="/storage/images/product/09.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">animal</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">cat</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Friendly Persian Cat Looking for a New Home</a>
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
                                    <img src="/storage/images/product/13.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">electronics</a>
                                    </li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">laptop</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>MacBook Pro M3, 16-inch - Under Warranty</a>
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
                                    <img src="/storage/images/product/11.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Duplex house</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Sea View Penthouse in JBR - Short Stay</a>
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
                                    <img src="/storage/images/product/15.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">camera</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Sony Mirrorless Camera Kit with Two Lenses</a>
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
                                    <img src="/storage/images/product/14.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">bike</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Yamaha Delivery Bike Available for Daily Hire</a>
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
                                    <img src="/storage/images/product/15.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">camera</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Sony Mirrorless Camera Kit with Two Lenses</a>
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
                                    <img src="/storage/images/product/07.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">resort</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>All-Inclusive Weekend at a Ras Al Khaimah Beach
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
                                    <img src="/storage/images/product/09.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">animal</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">cat</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Friendly Persian Cat Looking for a New Home</a>
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
                                    <img src="/storage/images/product/10.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">private car</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Toyota Camry 2023 for Monthly Rental</a>
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
                                    <img src="/storage/images/product/08.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">gadget</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">mobile</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Samsung Galaxy S24 Ultra - Like New</a>
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
                                    <img src="/storage/images/product/13.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">electronics</a>
                                    </li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">laptop</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>MacBook Pro M3, 16-inch - Under Warranty</a>
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
                                    <img src="/storage/images/product/14.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">automobile</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">bike</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Yamaha Delivery Bike Available for Daily Hire</a>
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
                                    <img src="/storage/images/product/11.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Duplex house</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href='{{ route('addetails') }}'>Sea View Penthouse in JBR - Short Stay</a>
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
                        <a class='btn btn-inline' href='{{ route('adlist3') }}'>
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
                    <a class='city-card' href='{{ route('adlist3') }}'
                        style='background: url(/storage/images/cities/01.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Dubai</h4>
                            <p>(1,240) ads</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a class='city-card' href='{{ route('adlist3') }}'
                        style='background: url(/storage/images/cities/02.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Abu Dhabi</h4>
                            <p>(860) ads</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-5">
                    <a class='city-card' href='{{ route('adlist3') }}'
                        style='background: url(/storage/images/cities/03.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Sharjah</h4>
                            <p>(420) ads</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-5">
                    <a class='city-card' href='{{ route('adlist3') }}'
                        style='background: url(/storage/images/cities/04.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Ajman</h4>
                            <p>(180) ads</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a class='city-card' href='{{ route('adlist3') }}'
                        style='background: url(/storage/images/cities/05.jpg) no-repeat center; background-size: cover'>
                        <div class="city-content">
                            <h4>Ras Al Khaimah</h4>
                            <p>(150) ads</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <a class='city-card' href='{{ route('adlist3') }}'
                        style='background: url(/storage/images/cities/06.jpg) no-repeat center; background-size: cover'>
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
                        <a class='btn btn-inline' href='{{ route('categorydetails') }}'>
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
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Best Reliable Pricing Plans</h2>
                        <p>Choose the plan that fits your business needs and start reaching customers across the UAE
                            today.</p>
                    </div>
                </div>
            </div> --}}
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
                            <a class='btn btn-inline btn-gold' href='{{ route('user') }}'>
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
                            <a class='btn btn-inline btn-gold' href='{{ route('user') }}'>
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
                            <a class='btn btn-inline btn-gold' href='{{ route('user') }}'>
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
@endsection
