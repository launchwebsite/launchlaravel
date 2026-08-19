@extends('layouts.layout')
@section('content')
    @include('includes.header')
    @include('includes.sidebar')


    <!--=====================================
                      SINGLE BANNER PART START
            =======================================-->
    <section class="inner-section single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>Category Details</h2>
                        <!-- <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href='index.php'>Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ad-list-column2</li>
                                </ol> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                      SINGLE BANNER PART END
            =======================================-->


    <!--=====================================
                        AD LIST PART START
            =======================================-->
    <section class="inner-section ad-list-part">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 ad-list-web-filter">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="product-widget">
                                <h6 class="product-widget-title">Filter by Emirates &amp; Areas</h6>
                                <form class="product-widget-form">
                                    <div class="product-widget-search">
                                        <input type="text" placeholder="Search">
                                    </div>
                                    <ul class="product-widget-list product-widget-scroll">
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek9">
                                            </div>
                                            <label class="product-widget-label" for="chcek9">
                                                <span class="product-widget-text">Downtown Dubai</span>
                                                <span class="product-widget-number">(95)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek10">
                                            </div>
                                            <label class="product-widget-label" for="chcek10">
                                                <span class="product-widget-text">Dubai Marina</span>
                                                <span class="product-widget-number">(82)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek11">
                                            </div>
                                            <label class="product-widget-label" for="chcek11">
                                                <span class="product-widget-text">Business Bay</span>
                                                <span class="product-widget-number">(71)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek12">
                                            </div>
                                            <label class="product-widget-label" for="chcek12">
                                                <span class="product-widget-text">Jumeirah</span>
                                                <span class="product-widget-number">(46)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek13">
                                            </div>
                                            <label class="product-widget-label" for="chcek13">
                                                <span class="product-widget-text">Deira</span>
                                                <span class="product-widget-number">(24)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek14">
                                            </div>
                                            <label class="product-widget-label" for="chcek14">
                                                <span class="product-widget-text">Al Barsha</span>
                                                <span class="product-widget-number">(34)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek15">
                                            </div>
                                            <label class="product-widget-label" for="chcek15">
                                                <span class="product-widget-text">JBR (Jumeirah Beach Residence)</span>
                                                <span class="product-widget-number">(82)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek16">
                                            </div>
                                            <label class="product-widget-label" for="chcek16">
                                                <span class="product-widget-text">Abu Dhabi</span>
                                                <span class="product-widget-number">(45)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek17">
                                            </div>
                                            <label class="product-widget-label" for="chcek17">
                                                <span class="product-widget-text">Sharjah</span>
                                                <span class="product-widget-number">(19)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <button type="submit" class="product-widget-btn">
                                        <i class="fas fa-broom"></i>
                                        <span>Clear Filter</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="product-widget">
                                <h6 class="product-widget-title">Filter by Popularity</h6>
                                <form class="product-widget-form">
                                    <div class="product-widget-search">
                                        <input type="text" placeholder="Search">
                                    </div>
                                    <ul class="product-widget-list product-widget-scroll">
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek9b">
                                            </div>
                                            <label class="product-widget-label" for="chcek9b">
                                                <span class="product-widget-text">Laptop</span>
                                                <span class="product-widget-number">(68)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek10b">
                                            </div>
                                            <label class="product-widget-label" for="chcek10b">
                                                <span class="product-widget-text">Camera</span>
                                                <span class="product-widget-number">(78)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek11b">
                                            </div>
                                            <label class="product-widget-label" for="chcek11b">
                                                <span class="product-widget-text">Television</span>
                                                <span class="product-widget-number">(34)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek12b">
                                            </div>
                                            <label class="product-widget-label" for="chcek12b">
                                                <span class="product-widget-text">Bicycle</span>
                                                <span class="product-widget-number">(43)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek13b">
                                            </div>
                                            <label class="product-widget-label" for="chcek13b">
                                                <span class="product-widget-text">Motorbike</span>
                                                <span class="product-widget-number">(57)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek14b">
                                            </div>
                                            <label class="product-widget-label" for="chcek14b">
                                                <span class="product-widget-text">Private Car</span>
                                                <span class="product-widget-number">(67)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek15b">
                                            </div>
                                            <label class="product-widget-label" for="chcek15b">
                                                <span class="product-widget-text">Air Conditioner</span>
                                                <span class="product-widget-number">(98)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek16b">
                                            </div>
                                            <label class="product-widget-label" for="chcek16b">
                                                <span class="product-widget-text">Apartment</span>
                                                <span class="product-widget-number">(45)</span>
                                            </label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox">
                                                <input type="checkbox" id="chcek17b">
                                            </div>
                                            <label class="product-widget-label" for="chcek17b">
                                                <span class="product-widget-text">Watch</span>
                                                <span class="product-widget-number">(76)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <button type="submit" class="product-widget-btn">
                                        <i class="fas fa-broom"></i>
                                        <span>Clear Filter</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="product-widget">
                                <h6 class="product-widget-title">Filter by Category</h6>
                                <form class="product-widget-form">
                                    <div class="product-widget-search">
                                        <input type="text" placeholder="Search">
                                    </div>
                                    <ul class="product-widget-list product-widget-scroll">
                                        <li class="product-widget-dropitem">
                                            <button type="button" class="product-widget-link">
                                                <i class="fas fa-tags"></i>
                                                Electronics (234)
                                            </button>
                                            <ul class="product-widget-dropdown">
                                                <li><a href="{{ '#' }}">Mixer (56)</a></li>
                                                <li><a href="{{ '#' }}">Freezer (78)</a></li>
                                                <li><a href="{{ '#' }}">LED TV (78)</a></li>
                                            </ul>
                                        </li>
                                        <li class="product-widget-dropitem">
                                            <button type="button" class="product-widget-link">
                                                <i class="fas fa-tags"></i>
                                                Automobiles (767)
                                            </button>
                                            <ul class="product-widget-dropdown">
                                                <li><a href="{{ '#' }}">Private Car (56)</a></li>
                                                <li><a href="{{ '#' }}">Motorbike (78)</a></li>
                                                <li><a href="{{ '#' }}">Truck (78)</a></li>
                                            </ul>
                                        </li>
                                        <li class="product-widget-dropitem">
                                            <button type="button" class="product-widget-link">
                                                <i class="fas fa-tags"></i>
                                                Properties (456)
                                            </button>
                                            <ul class="product-widget-dropdown">
                                                <li><a href="{{ '#' }}">Freehold Land (56)</a></li>
                                                <li><a href="{{ '#' }}">Apartment (78)</a></li>
                                                <li><a href="{{ '#' }}">Shop (78)</a></li>
                                            </ul>
                                        </li>
                                        <li class="product-widget-dropitem">
                                            <button type="button" class="product-widget-link">
                                                <i class="fas fa-tags"></i>
                                                Fashion (356)
                                            </button>
                                            <ul class="product-widget-dropdown">
                                                <li><a href="{{ '#' }}">Jeans (56)</a></li>
                                                <li><a href="{{ '#' }}">T-Shirt (78)</a></li>
                                                <li><a href="{{ '#' }}">Jacket (78)</a></li>
                                            </ul>
                                        </li>
                                        <li class="product-widget-dropitem">
                                            <button type="button" class="product-widget-link">
                                                <i class="fas fa-tags"></i>
                                                Gadgets (768)
                                            </button>
                                            <ul class="product-widget-dropdown">
                                                <li><a href="{{ '#' }}">Computer (56)</a></li>
                                                <li><a href="{{ '#' }}">Mobile (78)</a></li>
                                                <li><a href="{{ '#' }}">Drone (78)</a></li>
                                            </ul>
                                        </li>
                                        <li class="product-widget-dropitem">
                                            <button type="button" class="product-widget-link">
                                                <i class="fas fa-tags"></i>
                                                Furnitures (977)
                                            </button>
                                            <ul class="product-widget-dropdown">
                                                <li><a href="{{ '#' }}">Chair (56)</a></li>
                                                <li><a href="{{ '#' }}">Sofa (78)</a></li>
                                                <li><a href="{{ '#' }}">Table (78)</a></li>
                                            </ul>
                                        </li>
                                        <li class="product-widget-dropitem">
                                            <button type="button" class="product-widget-link">
                                                <i class="fas fa-tags"></i>
                                                Hospitality (124)
                                            </button>
                                            <ul class="product-widget-dropdown">
                                                <li><a href="{{ '#' }}">Hotel Apartment (56)</a></li>
                                                <li><a href="{{ '#' }}">Staff Uniform (78)</a></li>
                                                <li><a href="{{ '#' }}">Catering Equipment (78)</a></li>
                                            </ul>
                                        </li>
                                        <li class="product-widget-dropitem">
                                            <button type="button" class="product-widget-link">
                                                <i class="fas fa-tags"></i>
                                                Agriculture (565)
                                            </button>
                                            <ul class="product-widget-dropdown">
                                                <li><a href="{{ '#' }}">Irrigation Equipment (56)</a></li>
                                                <li><a href="{{ '#' }}">Date Palm Saplings (78)</a></li>
                                                <li><a href="{{ '#' }}">Greenhouse Supplies (78)</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <button type="submit" class="product-widget-btn">
                                        <i class="fas fa-broom"></i>
                                        <span>Clear Filter</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-filter">
                                <button class="flex items-center filter-btn">
                                    <i class="fas fa-filter"></i>
                                    <span class="text-capitalize">Filter</span>
                                </button>
                                <div class="filter-show">
                                    <label class="filter-label">Show :</label>
                                    <select class="form-select filter-select">
                                        <option value="1">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
                                    </select>
                                </div>
                                <div class="filter-short">
                                    <label class="filter-label">Sort by :</label>
                                    <select class="form-select filter-select">
                                        <option selected>Default</option>
                                        <option value="3">Trending</option>
                                        <option value="1">Featured</option>
                                        <option value="2">Recommended</option>
                                    </select>
                                </div>
                                <div class="filter-action">
                                    <a href='{{ route('adlist3') }}' title='Three Column'><i class="fas fa-th"></i></a>
                                    <a class='active' href='{{ route('adlist2') }}' title='Two Column'><i
                                            class="fas fa-th-large"></i></a>
                                    <a href='{{ route('adlist1') }}' title='One Column'><i class="fas fa-th-list"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ad-feature-slider slider-arrow">
                                <div class="feature-card">
                                    <a href="{{ '#' }}" class="feature-img">
                                        <img src="/storage/images/product/10.jpg" alt="feature">
                                    </a>
                                    <div class="cross-inline-badge feature-badge">
                                        <span>featured</span>
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <button type="button" class="feature-wish">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <div class="feature-content">
                                        <ol class="breadcrumb feature-category">
                                            <li><span class="flat-badge rent">rent</span></li>
                                            <li class="breadcrumb-item"><a href="{{ '#' }}">automobile</a></li>
                                        </ol>
                                        <h3 class="feature-title"><a href='{{ '#' }}'>Self-Drive SUV Rental with
                                                Unlimited Mileage and Full Insurance</a></h3>
                                        <div class="feature-meta">
                                            <span class="feature-price">AED 280<small>/Monthly</small></span>
                                            <span class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature-card">
                                    <a href="{{ '#' }}" class="feature-img">
                                        <img src="/storage/images/product/01.jpg" alt="feature">
                                    </a>
                                    <div class="cross-inline-badge feature-badge">
                                        <span>featured</span>
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <button type="button" class="feature-wish">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <div class="feature-content">
                                        <ol class="breadcrumb feature-category">
                                            <li><span class="flat-badge booking">booking</span></li>
                                            <li class="breadcrumb-item"><a href="{{ '#' }}">Property</a></li>
                                        </ol>
                                        <h3 class="feature-title"><a href='{{ '#' }}'>2-Bedroom Apartment in Al
                                                Barsha, Chiller Free, Near Metro</a></h3>
                                        <div class="feature-meta">
                                            <span class="feature-price">AED 800<small>/perday</small></span>
                                            <span class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature-card">
                                    <a href="{{ '#' }}" class="feature-img">
                                        <img src="/storage/images/product/08.jpg" alt="feature">
                                    </a>
                                    <div class="cross-inline-badge feature-badge">
                                        <span>featured</span>
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <button type="button" class="feature-wish">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <div class="feature-content">
                                        <ol class="breadcrumb feature-category">
                                            <li><span class="flat-badge sale">sale</span></li>
                                            <li class="breadcrumb-item"><a href="{{ '#' }}">gadget</a></li>
                                        </ol>
                                        <h3 class="feature-title"><a href='{{ '#' }}'>Brand New Flagship
                                                Smartphone, Sealed Box, Dubai Warranty</a></h3>
                                        <div class="feature-meta">
                                            <span class="feature-price">AED 1,150<small>/Negotiable</small></span>
                                            <span class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature-card">
                                    <a href="{{ '#' }}" class="feature-img">
                                        <img src="/storage/images/product/06.jpg" alt="feature">
                                    </a>
                                    <div class="cross-inline-badge feature-badge">
                                        <span>featured</span>
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <button type="button" class="feature-wish">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <div class="feature-content">
                                        <ol class="breadcrumb feature-category">
                                            <li><span class="flat-badge sale">sale</span></li>
                                            <li class="breadcrumb-item"><a href="{{ '#' }}">automobile</a></li>
                                        </ol>
                                        <h3 class="feature-title"><a href='{{ '#' }}'>Electric Scooter, Barely
                                                Used, Ideal for JLT Commutes</a></h3>
                                        <div class="feature-meta">
                                            <span class="feature-price">AED 455<small>/fixed</small></span>
                                            <span class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-img">
                                        <img src="/storage/images/product/07.jpg" alt="Luxury villa in Palm Jumeirah">
                                    </div>
                                    <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-clipboard-check"></i>
                                        <span>recommend</span>
                                    </div>
                                    <div class="product-type">
                                        <span class="flat-badge booking">booking</span>
                                    </div>
                                    <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                        <li class="rating"><i class="fas fa-star"></i><span>4.5/5</span></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <ol class="breadcrumb product-category">
                                        <li><i class="fas fa-tags"></i></li>
                                        <li class="breadcrumb-item"><a href="{{ '#' }}">Luxury</a></li>
                                    </ol>
                                    <h5 class="product-title">
                                        <a href="{{ '#' }}">5-Bedroom Signature Villa with Private Beach
                                            Access</a>
                                    </h5>
                                    <div class="product-meta">
                                        <span><i class="fas fa-map-marker-alt"></i>Palm Jumeirah, Dubai</span>
                                        <span><i class="fas fa-clock"></i>30 min ago</span>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-price">AED 5,840<span>/per week</span></h5>
                                        <div class="product-btn">
                                            <!-- <a class='fas fa-compress' href='compare.php' title='Compare'></a> -->
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-img">
                                        <img src="/storage/images/product/08.jpg" alt="Latest smartphone for sale in Dubai">
                                    </div>
                                    <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-clipboard-check"></i>
                                        <span>recommend</span>
                                    </div>
                                    <div class="product-type">
                                        <span class="flat-badge sale">sale</span>
                                    </div>
                                    <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                        <li class="rating"><i class="fas fa-star"></i><span>4.5/5</span></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <ol class="breadcrumb product-category">
                                        <li><i class="fas fa-tags"></i></li>
                                        <li class="breadcrumb-item"><a href="{{ '#' }}">Gadget</a></li>
                                    </ol>
                                    <h5 class="product-title">
                                        <a href="{{ '#' }}">Brand New Flagship Smartphone, Sealed Box, Dubai
                                            Warranty</a>
                                    </h5>
                                    <div class="product-meta">
                                        <span><i class="fas fa-map-marker-alt"></i>Deira, Dubai</span>
                                        <span><i class="fas fa-clock"></i>30 min ago</span>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-price">AED 1,670<span>/fixed</span></h5>
                                        <div class="product-btn">
                                            <!-- <a class='fas fa-compress' href='compare.php' title='Compare'></a> -->
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-img">
                                        <img src="/storage/images/product/10.jpg" alt="Rent a car in Dubai Marina">
                                    </div>
                                    <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-bolt"></i>
                                        <span>trending</span>
                                    </div>
                                    <div class="product-type">
                                        <span class="flat-badge rent">rent</span>
                                    </div>
                                    <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                        <li class="rating"><i class="fas fa-star"></i><span>4.5/5</span></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <ol class="breadcrumb product-category">
                                        <li><i class="fas fa-tags"></i></li>
                                        <li class="breadcrumb-item"><a href="{{ '#' }}">Automobile</a></li>
                                    </ol>
                                    <h5 class="product-title">
                                        <a href="{{ '#' }}">Self-Drive SUV Rental, Unlimited Mileage, Full
                                            Insurance</a>
                                    </h5>
                                    <div class="product-meta">
                                        <span><i class="fas fa-map-marker-alt"></i>Dubai Marina, Dubai</span>
                                        <span><i class="fas fa-clock"></i>30 min ago</span>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-price">AED 280<span>/per month</span></h5>
                                        <div class="product-btn">
                                            <!-- <a class='fas fa-compress' href='compare.php' title='Compare'></a> -->
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-img">
                                        <img src="/storage/images/product/11.jpg" alt="Duplex penthouse in Downtown Dubai">
                                    </div>
                                    <div class="cross-vertical-badge product-badge">
                                        <i class="fas fa-bolt"></i>
                                        <span>trending</span>
                                    </div>
                                    <div class="product-type">
                                        <span class="flat-badge booking">booking</span>
                                    </div>
                                    <ul class="product-action">
                                        <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                        <li class="rating"><i class="fas fa-star"></i><span>4.5/5</span></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <ol class="breadcrumb product-category">
                                        <li><i class="fas fa-tags"></i></li>
                                        <li class="breadcrumb-item"><a href="{{ '#' }}">Luxury</a></li>
                                    </ol>
                                    <h5 class="product-title">
                                        <a href="{{ '#' }}">Duplex Penthouse with Burj Khalifa View, Fully
                                            Furnished</a>
                                    </h5>
                                    <div class="product-meta">
                                        <span><i class="fas fa-map-marker-alt"></i>Downtown Dubai, Dubai</span>
                                        <span><i class="fas fa-clock"></i>30 min ago</span>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-price">AED 5,400<span>/per day</span></h5>
                                        <div class="product-btn">
                                            <!-- <a class='fas fa-compress' href='compare.php' title='Compare'></a> -->
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-img">
                                        <img src="/storage/images/product/14.jpg" alt="Mountain bike rental in Dubai">
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
                                        <li class="rating"><i class="fas fa-star"></i><span>4.5/5</span></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <ol class="breadcrumb product-category">
                                        <li><i class="fas fa-tags"></i></li>
                                        <li class="breadcrumb-item"><a href="{{ '#' }}">Automobile</a></li>
                                    </ol>
                                    <h5 class="product-title">
                                        <a href="{{ '#' }}">Mountain Bike Rental, Perfect for Al Qudra Cycling
                                            Track</a>
                                    </h5>
                                    <div class="product-meta">
                                        <span><i class="fas fa-map-marker-alt"></i>Al Qudra, Dubai</span>
                                        <span><i class="fas fa-clock"></i>30 min ago</span>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-price">AED 35<span>/per hour</span></h5>
                                        <div class="product-btn">
                                            <!-- <a class='fas fa-compress' href='compare.php' title='Compare'></a> -->
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-img">
                                        <img src="/storage/images/product/15.jpg" alt="DSLR camera for sale in Dubai">
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
                                        <li class="rating"><i class="fas fa-star"></i><span>4.5/5</span></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <ol class="breadcrumb product-category">
                                        <li><i class="fas fa-tags"></i></li>
                                        <li class="breadcrumb-item"><a href="{{ '#' }}">Gadget</a></li>
                                    </ol>
                                    <h5 class="product-title">
                                        <a href="{{ '#' }}">Professional DSLR Camera Kit with Two Lenses and
                                            Bag</a>
                                    </h5>
                                    <div class="product-meta">
                                        <span><i class="fas fa-map-marker-alt"></i>Jumeirah, Dubai</span>
                                        <span><i class="fas fa-clock"></i>30 min ago</span>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-price">AED 4,400<span>/Negotiable</span></h5>
                                        <div class="product-btn">
                                            <!-- <a class='fas fa-compress' href='compare.php' title='Compare'></a> -->
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-pagection">
                                <p class="page-info">Showing 12 of 60 Results</p>
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-long-arrow-alt-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">...</li>
                                    <li class="page-item"><a class="page-link" href="#">67</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-long-arrow-alt-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                        AD LIST PART END
            =======================================-->


    @include('includes.footer')
@endsection

