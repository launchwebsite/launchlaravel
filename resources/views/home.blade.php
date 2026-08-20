@extends('layouts.layout')
@section('content')
    @include('includes.header')

    @include('includes.sidebar')

    <section class="banner-part">
        <div class="container">
            <div class="banner-content">
                <h1>Launch - Buy, #Rent, #Book anything across the #UAE.</h1>
                <p>Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs
                    and more across Dubai, Abu Dhabi, Sharjah and the rest of the UAE.</p>
                <a class='btn btn-outline' href='{{ route('categorylist') }}'>
                    <i class="fas fa-eye"></i>
                    <span>Show all ads</span>
                </a>
            </div>
        </div>
    </section>

    <section class="suggest-part">
        <div class="container">
            <div class="suggest-slider slider-arrow">
                @foreach ($category as $item)
                    <a class="suggest-card" href="{{ strtolower(trim($item->CT_Name)) === 'jobs' ? route('jobopening') : route('categorydetails', ['category' => \Vinkla\Hashids\Facades\Hashids::encode($item->CT_Id)]) }}">

                        <img src="/storage/uploads/categories/{{ $item->CT_Img }}" alt="{{ $item->CT_Name }}"
                            style="border-radius: 20px">

                        <h6>{{ $item->CT_Name }}</h6>

                        @if (strtolower($item->CT_Name) === 'jobs')
                            <p>({{ $careerCount }}) jobs</p>
                        @else
                            <p>({{ $item->products_count }}) ads</p>
                        @endif

                    </a>
                @endforeach
            </div>
        </div>
    </section>

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

                                <img src="/storage/uploads/categories/{{ $item->CT_Img }}" alt="{{ $item->CT_Name }}">

                                <a href="{{ route('categorydetails', ['category' => \Vinkla\Hashids\Facades\Hashids::encode($item->CT_Id)]) }}" class="category-content">

                                    <h4>{{ $item->CT_Name }}</h4>

                                    {{-- CATEGORY COUNT --}}
                                    @if (strtolower(trim($item->CT_Name)) === 'jobs')
                                        <p>
                                            ({{ $careerCategoryCounts[$item->CT_Id] ?? 0 }})
                                        </p>
                                    @else
                                        <p>
                                            ({{ $item->products_count }})
                                        </p>
                                    @endif

                                </a>

                            </div>


                            <ul class="category-list goldy">

                                @foreach ($item->subcategories as $subcategory)
                                    <li>

                                        <a href="{{ route('categorydetails', ['subcategory' => \Vinkla\Hashids\Facades\Hashids::encode($subcategory->SC_Id)]) }}">

                                            <h6>
                                                {{ $subcategory->SC_Name }}
                                            </h6>

                                            {{-- SUBCATEGORY COUNT --}}
                                            @if (strtolower(trim($item->CT_Name)) === 'jobs')
                                                <p>
                                                    ({{ $careerSubcategoryCounts[$subcategory->SC_Id] ?? 0 }})
                                                </p>
                                            @else
                                                <p>
                                                    ({{ $subcategory->products_count }})
                                                </p>
                                            @endif

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
                        @foreach ($careers as $career)
                            <div class="product-card jobbies">
                                <div class="product-media">
                                    <div class="product-img">
                                        <img src="{{ asset('uploads/career/' . $career->CR_Img) }}" alt="Jobs">
                                    </div>

                                    <div class="product-type">
                                        <span class="flat-badge sale">{{ $career->CR_Type }}</span>
                                    </div>
                                </div>
                                <div class="product-content bil-bil">
                                    <ol class="breadcrumb product-category odyssey">
                                    </ol>

                                    <h5 class="product-title blue-reccom">
                                        <form action="{{ route('applyjob.select') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="career_id" value="{{ \Vinkla\Hashids\Facades\Hashids::encode($career->CR_Id) }}">
                                            <button type="submit" class="btn-link-plain">
                                                {{ $career->CR_Name }}
                                            </button>
                                        </form>
                                    </h5>

                                    <div class="product-meta blue-meta">
                                        <span><i class="fas fa-map-marker-alt"></i>{{ $career->CR_Location }}</span>
                                        <span>
                                            <i class="fas fa-clock"></i>
                                            Posted : {{ $career->updated_at->format('F j, Y') }}
                                        </span>
                                    </div>
                                    <div class="product-info blue-price">
                                        <h5 class="product-price panam">{{ $career->CR_SalaryRange }}</h5>
                                        <div class="product-btn">
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-50">
                        <a class='btn btn-inline btn-greeny' href='{{ route('jobopening') }}'>
                            <i class="fas fa-eye"></i>
                            <span>view all recommend</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

                @foreach ($products as $item)
                    @php
                        $d = $item->PR_Details;

                        if (in_array($item->SC_Id, [7, 17, 18, 19])) {
                            // furniture
                            $title =
                                $d['Bed Type'] ??
                                ($d['Sofa Type'] ??
                                    ($d['Table Type'] ?? ($d['Wardrobe Type'] ?? 'Ad #' . $item->PR_Id)));
                            $badge = $d['Condition'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [20, 21, 22, 23])) {
                            // property
                            $title = $d['Property Title'] ?? 'Ad #' . $item->PR_Id;
                            $badge = $d['Property Type'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [24, 25, 26, 27])) {
                            // electronics
                            $title = trim(($d['Brand'] ?? '') . ' ' . ($d['Model'] ?? '')) ?: 'Ad #' . $item->PR_Id;
                            $badge = $d['Condition'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [28, 29, 30, 31])) {
                            // vehicles
                            $title = $d['Vehicle Title'] ?? 'Ad #' . $item->PR_Id;
                            $badge = $d['Body Type'] ?? ($d['Condition'] ?? 'N/A');
                        } else {
                            $title = 'Ad #' . $item->PR_Id;
                            $badge = $d['Condition'] ?? 'N/A';
                        }

                        $image = $d['Main Image'] ?? null;
                    @endphp

                    <div class="col-md-11 col-lg-8 col-xl-6">
                        <div class="product-card standard">
                            <div class="product-media">
                                <div class="product-img">
                                    @if ($image)
                                        <img src="/storage/uploads/products/{{ $image }}" alt="product">
                                    @else
                                        <img src="/storage/images/product/01.jpg" alt="product">
                                    @endif
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge booking">{{ $badge }}</span>
                                </div>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item">
                                        {{ $badge }}
                                    </li>
                                </ol>
                                <h5 class="product-title">
                                    <a href="{{ route('addetails', \Vinkla\Hashids\Facades\Hashids::encode($item->PR_Id)) }}">{{ $title }}</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>{{ $d['Location'] ?? 'N/A' }}</span>
                                    <span><i class="fas fa-clock"></i>{{ $item->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">{{ $d['Price'] ?? 'N/A' }}</h5>
                                    <div class="product-btn">
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20">
                        <a class='btn btn-inline' href='{{ route('categorydetails') }}'>
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
                @foreach ($topRatings as $item)
                    @php
                        $d = $item->PR_Details;

                        if (in_array($item->SC_Id, [7, 17, 18, 19])) {
                            // furniture
                            $title =
                                $d['Bed Type'] ??
                                ($d['Sofa Type'] ??
                                    ($d['Table Type'] ?? ($d['Wardrobe Type'] ?? 'Ad #' . $item->PR_Id)));
                            $badge = $d['Condition'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [20, 21, 22, 23])) {
                            // property
                            $title = $d['Property Title'] ?? 'Ad #' . $item->PR_Id;
                            $badge = $d['Property Type'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [24, 25, 26, 27])) {
                            // electronics
                            $title = trim(($d['Brand'] ?? '') . ' ' . ($d['Model'] ?? '')) ?: 'Ad #' . $item->PR_Id;
                            $badge = $d['Condition'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [28, 29, 30, 31])) {
                            // vehicles
                            $title = $d['Vehicle Title'] ?? 'Ad #' . $item->PR_Id;
                            $badge = $d['Body Type'] ?? ($d['Condition'] ?? 'N/A');
                        } else {
                            $title = 'Ad #' . $item->PR_Id;
                            $badge = $d['Condition'] ?? 'N/A';
                        }

                        $image = $d['Main Image'] ?? null;
                    @endphp

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    @if ($image)
                                        <img src="/storage/uploads/products/{{ $image }}" alt="product">
                                    @else
                                        <img src="/storage/images/product/01.jpg" alt="product">
                                    @endif
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge booking">{{ $badge }}</span>
                                </div>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item">
                                        {{ $badge }}
                                    </li>
                                </ol>
                                <h5 class="product-title">
                                    <a href="{{ route('addetails', \Vinkla\Hashids\Facades\Hashids::encode($item->PR_Id)) }}">{{ $title }}</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>{{ $d['Location'] ?? 'N/A' }}</span>
                                    <span><i class="fas fa-clock"></i>{{ $item->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">{{ $d['Price'] ?? 'N/A' }}</h5>
                                    <div class="product-btn">
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div> <!-- Rating ads -->

            <div class="tab-pane " id="advertiser">
                <div class="row">
                @foreach ($topAdvertiser as $item)
                    @php
                        $d = $item->PR_Details;

                        if (in_array($item->SC_Id, [7, 17, 18, 19])) {
                            // furniture
                            $title =
                                $d['Bed Type'] ??
                                ($d['Sofa Type'] ??
                                    ($d['Table Type'] ?? ($d['Wardrobe Type'] ?? 'Ad #' . $item->PR_Id)));
                            $badge = $d['Condition'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [20, 21, 22, 23])) {
                            // property
                            $title = $d['Property Title'] ?? 'Ad #' . $item->PR_Id;
                            $badge = $d['Property Type'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [24, 25, 26, 27])) {
                            // electronics
                            $title = trim(($d['Brand'] ?? '') . ' ' . ($d['Model'] ?? '')) ?: 'Ad #' . $item->PR_Id;
                            $badge = $d['Condition'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [28, 29, 30, 31])) {
                            // vehicles
                            $title = $d['Vehicle Title'] ?? 'Ad #' . $item->PR_Id;
                            $badge = $d['Body Type'] ?? ($d['Condition'] ?? 'N/A');
                        } else {
                            $title = 'Ad #' . $item->PR_Id;
                            $badge = $d['Condition'] ?? 'N/A';
                        }

                        $image = $d['Main Image'] ?? null;
                    @endphp

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    @if ($image)
                                        <img src="/storage/uploads/products/{{ $image }}" alt="product">
                                    @else
                                        <img src="/storage/images/product/01.jpg" alt="product">
                                    @endif
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge booking">{{ $badge }}</span>
                                </div>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item">
                                        {{ $badge }}
                                    </li>
                                </ol>
                                <h5 class="product-title">
                                    <a href="{{ route('addetails', \Vinkla\Hashids\Facades\Hashids::encode($item->PR_Id)) }}">{{ $title }}</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>{{ $d['Location'] ?? 'N/A' }}</span>
                                    <span><i class="fas fa-clock"></i>{{ $item->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">{{ $d['Price'] ?? 'N/A' }}</h5>
                                    <div class="product-btn">
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div> <!-- Advertiser ads -->

            <div class="tab-pane" id="engaged">
                <div class="row">
                @foreach ($topEngaged as $item)
                    @php
                        $d = $item->PR_Details;

                        if (in_array($item->SC_Id, [7, 17, 18, 19])) {
                            // furniture
                            $title =
                                $d['Bed Type'] ??
                                ($d['Sofa Type'] ??
                                    ($d['Table Type'] ?? ($d['Wardrobe Type'] ?? 'Ad #' . $item->PR_Id)));
                            $badge = $d['Condition'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [20, 21, 22, 23])) {
                            // property
                            $title = $d['Property Title'] ?? 'Ad #' . $item->PR_Id;
                            $badge = $d['Property Type'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [24, 25, 26, 27])) {
                            // electronics
                            $title = trim(($d['Brand'] ?? '') . ' ' . ($d['Model'] ?? '')) ?: 'Ad #' . $item->PR_Id;
                            $badge = $d['Condition'] ?? 'N/A';
                        } elseif (in_array($item->SC_Id, [28, 29, 30, 31])) {
                            // vehicles
                            $title = $d['Vehicle Title'] ?? 'Ad #' . $item->PR_Id;
                            $badge = $d['Body Type'] ?? ($d['Condition'] ?? 'N/A');
                        } else {
                            $title = 'Ad #' . $item->PR_Id;
                            $badge = $d['Condition'] ?? 'N/A';
                        }

                        $image = $d['Main Image'] ?? null;
                    @endphp

                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    @if ($image)
                                        <img src="/storage/uploads/products/{{ $image }}" alt="product">
                                    @else
                                        <img src="/storage/images/product/01.jpg" alt="product">
                                    @endif
                                </div>
                                <div class="product-type">
                                    <span class="flat-badge booking">{{ $badge }}</span>
                                </div>
                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li><i class="fas fa-tags"></i></li>
                                    <li class="breadcrumb-item">
                                        {{ $badge }}
                                    </li>
                                </ol>
                                <h5 class="product-title">
                                    <a href="{{ route('addetails', \Vinkla\Hashids\Facades\Hashids::encode($item->PR_Id)) }}">{{ $title }}</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>{{ $d['Location'] ?? 'N/A' }}</span>
                                    <span><i class="fas fa-clock"></i>{{ $item->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">{{ $d['Price'] ?? 'N/A' }}</h5>
                                    <div class="product-btn">
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div> <!-- Engaged ads -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="center-20">
                        <a class='btn btn-inline' href='{{ route('categorydetails') }}'>
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
                @php
                    $cardsConfig = [
                        ['col' => 'col-sm-6 col-md-6 col-lg-3', 'img' => '01.jpg'],
                        ['col' => 'col-sm-6 col-md-6 col-lg-4', 'img' => '02.jpg'],
                        ['col' => 'col-sm-6 col-md-6 col-lg-5', 'img' => '03.jpg'],
                        ['col' => 'col-sm-6 col-md-6 col-lg-5', 'img' => '04.jpg'],
                        ['col' => 'col-sm-6 col-md-6 col-lg-4', 'img' => '05.jpg'],
                        ['col' => 'col-sm-6 col-md-6 col-lg-3', 'img' => '06.jpg'],
                    ];
                    $cityIndex = 0;
                @endphp
                @foreach ($topCities as $city => $count)
                    @if ($cityIndex < 6)
                        @php $config = $cardsConfig[$cityIndex++]; @endphp
                        <div class="{{ $config['col'] }}">
                            <a class='city-card' href='{{ route('categorydetails', ['location[]' => $city]) }}'
                                style='background: url(/storage/images/cities/{{ $config['img'] }}) no-repeat center; background-size: cover'>
                                <div class="city-content">
                                    <h4>{{ $city }}</h4>
                                    <p>({{ $count }}) ads</p>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
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
                        <p>Reach thousands of buyers across the UAE with Launch - the region's trusted marketplace
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


    @include('includes.pricing')

    @include('includes.footer')
@endsection

