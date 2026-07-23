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
                        <h2>Category List</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                          SINGLE BANNER PART END
                =======================================-->


    <!--=====================================
                            CATEGORY PART START
                =======================================-->
    <section class="inner-section category-part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card golden">
                        <div class="category-head">
                            <img src="/storage/images/category/properties.jpg" alt="category">
                            <a href="{{ route('categorydetails') }}" class="category-content">
                                <h4>Properties</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list goldy">
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Apartments</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Villas</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Townhouses</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Penthouses</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Hotel Apartments</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card golden">
                        <div class="category-head">
                            <img src="/storage/images/category/automobiles.jpg" alt="category">
                            <a href="{{ route('categorydetails') }}" class="category-content">
                                <h4>Cars</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list goldy">
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Sedan</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>SUV</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Pickup Trucks</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Luxury Cars</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Electric Cars</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card golden">
                        <div class="category-head">
                            <img src="/storage/images/category/fashions.jpg" alt="category">
                            <a href="{{ route('categorydetails') }}" class="category-content">
                                <h4>Jobs</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list goldy">
                            <li><a href="{{ route('addetails') }}">
                                    <h6>IT & Software</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Sales & Marketing</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Accounting & Finance</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Engineering</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Hospitality</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="category-card golden">
                        <div class="category-head">
                            <img src="/storage/images/category/gadgets.jpg" alt="category">
                            <a href="{{ route('categorydetails') }}" class="category-content">
                                <h4>Classifieds</h4>
                                <p>(3678)</p>
                            </a>
                        </div>
                        <ul class="category-list goldy">
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Electronics</h6>
                                    <p>(34)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Furniture</h6>
                                    <p>(24)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Home Appliances</h6>
                                    <p>(12)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Fashion & Beauty</h6>
                                    <p>(19)</p>
                                </a></li>
                            <li><a href="{{ route('addetails') }}">
                                    <h6>Sports & Fitness</h6>
                                    <p>(56)</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20">
                        <a href="{{ route('categorydetails') }}" class="btn btn-inline btn-blue">
                            <i class="fas fa-eye"></i>
                            <span>show more categories</span>
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
                            INTRO PART START
                =======================================-->
    <section class="intro-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Do you have something to advertise?</h2>
                        <p>Reach thousands of buyers across the UAE with Launch INCS - the region's trusted marketplace for
                            property, automobiles, jobs and more.</p>
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
                        <p>Choose the plan that fits your business needs and start reaching customers across the UAE today.
                        </p>
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
