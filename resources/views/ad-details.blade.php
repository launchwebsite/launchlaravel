@extends('layouts.layout')
@section('content')
    @include('includes.header')
    @include('includes.sidebar')

    <!--=====================================
                      SINGLE BANNER PART START
            =======================================-->
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>5-Bedroom Signature Villa with Private Beach Access</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                      SINGLE BANNER PART END
            =======================================-->


    <!--=====================================
                        AD DETAILS PART START
            =======================================-->
    <section class="inner-section ad-details-part">
        <div class="container">
            <div class="row content-reverse">
                <div class="col-lg-4">

                    <!-- PRICE CARD -->
                    <div class="common-card price">
                        <h3>AED 8,600,000<span>/negotiable</span></h3>
                        <i class="fas fa-tag"></i>
                    </div>

                    <!-- NUMBER CARD -->
                    <button type="button" class="common-card number" data-bs-toggle="modal" data-bs-target="#number">
                        <h3>(+971)<span>Click to show</span></h3>
                        <i class="fas fa-phone"></i>
                    </button>

                    <!-- AUTHOR CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">author info</h5>
                        </div>
                        <div class="ad-details-author">
                            <a class="author-img active">
                                <img src="/storage/images/avatar/01.jpg" alt="avatar">
                            </a>
                            <div class="author-meta">
                                <h4>Admin</h4>
                                <h5>joined: february 02, 2021</h5>
                                <p>Trusted real estate broker serving Dubai and the wider UAE property market.</p>
                            </div>
                            <div class="author-widget">
                                <button type="button" title="Follow" class="follow fas fa-heart"></button>
                                <button type="button" title="Number" class="fas fa-phone" data-bs-toggle="modal"
                                    data-bs-target="#number"></button>
                            </div>
                            <ul class="author-list">
                                <li>
                                    <h6>total ads</h6>
                                    <p>134</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- SAFETY CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">safety tips</h5>
                        </div>
                        <div class="ad-details-safety">
                            <p>Check the property before you buy</p>
                            <p>Pay only after verifying ownership documents</p>
                            <p>Beware of unrealistic offers</p>
                            <p>Meet the agent at the property or office</p>
                            <p>Do not make an abrupt decision</p>
                            <p>Be honest with the ad you post</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                    <!-- AD DETAILS CARD -->
                    <div class="common-card">
                        <ol class="breadcrumb ad-details-breadcrumb">
                            <li><span class="flat-badge sale">for sale</span></li>
                            <li class="breadcrumb-item"><a>Property</a></li>
                        </ol>
                        <h5 class="ad-details-address">Palm Jumeirah, Dubai, United Arab Emirates</h5>
                        <h3 class="ad-details-title">Exclusive 5-Bedroom Signature Villa with Private Beach Access on
                            Palm Jumeirah</h3>
                        <!-- <div class="ad-details-meta">
                                    <a class="view">
                                        <i class="fas fa-eye"></i>
                                        <span><strong>(134)</strong>preview</span>
                                    </a>
                                    <a class="click">
                                        <i class="fas fa-mouse"></i>
                                        <span><strong>(76)</strong>click</span>
                                    </a>
                                    <a href="#review" class="rating">
                                        <i class="fas fa-star"></i>
                                        <span><strong>(29)</strong>review</span>
                                    </a>
                                </div> -->
                        <div class="ad-details-slider-group">
                            <div class="ad-details-slider slider-arrow">
                                <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                                <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                                <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                                <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                            </div>
                            <div class="cross-vertical-badge ad-details-badge">
                                <i class="fas fa-clipboard-check"></i>
                                <span>recommend</span>
                            </div>
                        </div>
                        <div class="ad-thumb-slider">
                            <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                            <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                            <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                            <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                        </div>
                        <!-- <div class="ad-details-action">
                                    <button type="button" class="wish"><i class="fas fa-heart"></i>bookmark</button>
                                    <button type="button"><i class="fas fa-exclamation-triangle"></i>report</button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#ad-share">
                                        <i class="fas fa-share-alt"></i>
                                        share
                                    </button>
                                </div> -->
                    </div>

                    <!-- SPECIFICATION CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">Specification</h5>
                        </div>
                        <ul class="ad-details-specific">
                            <li>
                                <h6>price:</h6>
                                <p>AED 8,600,000</p>
                            </li>
                            <li>
                                <h6>seller type:</h6>
                                <p>agent</p>
                            </li>
                            <li>
                                <h6>published:</h6>
                                <p>february 02, 2021</p>
                            </li>
                            <li>
                                <h6>location:</h6>
                                <p>Palm Jumeirah, Dubai</p>
                            </li>
                            <li>
                                <h6>category:</h6>
                                <p>property</p>
                            </li>
                            <li>
                                <h6>condition:</h6>
                                <p>ready</p>
                            </li>
                            <li>
                                <h6>price type:</h6>
                                <p>negotiable</p>
                            </li>
                            <li>
                                <h6>ad type:</h6>
                                <p>sales</p>
                            </li>
                        </ul>
                    </div>

                    <!-- DESCRIPTION CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">description</h5>
                        </div>
                        <p class="ad-details-desc">This signature 5-bedroom villa sits on a private beachfront plot on
                            Palm Jumeirah, offering direct sea access, a landscaped garden, and unobstructed views of
                            the Dubai skyline. The residence features a private pool, home cinema, maid's quarters, and
                            a double-height majlis designed for entertaining. Finished to the highest standard with
                            imported marble flooring and floor-to-ceiling windows throughout.</p> <br>

                        <p class="ad-details-desc">Located minutes from Dubai Marina and Downtown Dubai, the villa
                            offers easy access to top schools, hospitals, and retail destinations. The community
                            provides 24-hour security, valet service, and access to a private beach club. Ideal for
                            end-users and investors seeking a premium freehold asset in one of Dubai's most sought-after
                            waterfront communities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                        AD DETAILS PART END
            =======================================-->


    <!--=====================================
                        RELATED PART START
            =======================================-->
    <section class="inner-section related-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2>Related This <span>Ads</span></h2>
                        <p>Explore more premium properties and listings across Dubai and the UAE from Launch Incs.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="related-slider slider-arrow">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="/storage/images/product/01.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Luxury</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Duplex Apartment</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href="{{ route('addetails') }}">Spacious 3-Bedroom Duplex Apartment in Downtown
                                        Dubai</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Downtown, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 3,200,000<span>/negotiable</span></h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="/storage/images/product/03.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Off-Plan</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Studio</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href="{{ route('addetails') }}">Modern Studio Apartment in Business Bay</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Business Bay, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 650,000<span>/fixed</span></h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="/storage/images/product/10.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Townhouse</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Family Home</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href="{{ route('addetails') }}">4-Bedroom Townhouse in Arabian Ranches</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Arabian Ranches, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 4,750,000<span>/fixed</span></h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="/storage/images/product/09.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Waterfront</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Penthouse</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href="{{ route('addetails') }}">Luxury Penthouse with Marina Views in Dubai
                                        Marina</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Dubai Marina, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 6,900,000<span>/Negotiable</span></h5>
                                    <div class="product-btn">
                                        <!-- <a class='fas fa-compress' href='compare.html' title='Compare'></a> -->
                                        <button type="button" title="Wishlist" class="far fa-heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img">
                                    <img src="/storage/images/product/02.jpg" alt="product">
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
                                    <li class="breadcrumb-item"><a href="{{ route('addetails') }}">Villa</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Compound</li> -->
                                </ol>
                                <h5 class="product-title">
                                    <a href="{{ route('addetails') }}">6-Bedroom Villa in Emirates Hills</a>
                                </h5>
                                <div class="product-meta">
                                    <span><i class="fas fa-map-marker-alt"></i>Emirates Hills, Dubai</span>
                                    <span><i class="fas fa-clock"></i>30 min ago</span>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-price">AED 15,500,000<span>/fixed</span></h5>
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
                        <a class='btn btn-inline' href='{{ route('adlist3') }}'>
                            <i class="fas fa-eye"></i>
                            <span>view all related</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                        RELATED PART START
            =======================================-->

    <div class="modal fade" id="number">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Contact this Number</h4>
                    <button class="fas fa-times" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h3 class="modal-number">+971 56 452 7879</h3>
                </div>
            </div>
        </div>
    </div>


    @include('includes.footer')
@endsection
