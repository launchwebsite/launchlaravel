@extends('layouts.layout')
@section('content')
    @include('includes.header')
    @include('includes.sidebar')

    @php
        $d = $product->PR_Details;

        // Keys already rendered separately, so skip them in the generic spec loop
        $excludedKeys = [
            'Description',
            'Price',
            'Main Image',
            'Image 1',
            'Image 2',
            'Image 3',
            'Property Title',
            'Vehicle Title',
        ];

        if (!function_exists('getClosestColorName')) {
            function getClosestColorName($hex) {
                $hex = ltrim($hex, '#');
                if (strlen($hex) != 6) return $hex;
                
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));

                $colors = [
                    'Black' => [0, 0, 0], 'White' => [255, 255, 255], 'Red' => [255, 0, 0], 
                    'Lime' => [0, 255, 0], 'Blue' => [0, 0, 255], 'Yellow' => [255, 255, 0], 
                    'Cyan' => [0, 255, 255], 'Magenta' => [255, 0, 255], 'Silver' => [192, 192, 192], 
                    'Gray' => [128, 128, 128], 'Dark Gray' => [51, 51, 51], 'Maroon' => [128, 0, 0], 
                    'Olive' => [128, 128, 0], 'Green' => [0, 128, 0], 'Purple' => [128, 0, 128], 
                    'Teal' => [0, 128, 128], 'Navy' => [0, 0, 128], 'Orange' => [255, 165, 0], 
                    'Gold' => [255, 215, 0], 'Pink' => [255, 192, 203], 'Brown' => [165, 42, 42], 
                    'Beige' => [245, 245, 220], 'Coral' => [255, 127, 80], 'Indigo' => [75, 0, 130]
                ];

                $minDistance = INF;
                $closestColor = '#' . $hex;

                foreach ($colors as $name => $rgb) {
                    $distance = sqrt(pow($r - $rgb[0], 2) + pow($g - $rgb[1], 2) + pow($b - $rgb[2], 2));
                    if ($distance < $minDistance) {
                        $minDistance = $distance;
                        $closestColor = $name;
                    }
                }
                return $closestColor;
            }
        }
    @endphp

    <!--=====================================
                              SINGLE BANNER PART START
                    =======================================-->
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{ $product->display_title }}</h2>
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
                        <h3>{{ $product->display_price }}<span>/negotiable</span></h3>
                        <i class="fas fa-tag"></i>
                    </div>

                    <!-- NUMBER CARD -->
                    @php
                        $phone = $product->vendor?->VR_Phone;
                        if (!$phone) {
                            $phone = 'Not Provided';
                            $maskedPhone = 'N/A';
                        } else {
                            // Try to extract country code or first 4 digits
                            $maskedPhone = strlen($phone) >= 6 ? substr($phone, 0, 4) . '***' : '***';
                        }
                    @endphp
                    <button type="button" class="common-card number" data-bs-toggle="modal" data-bs-target="#number" {{ $phone === 'Not Provided' ? 'disabled' : '' }}>
                        <h3>{{ $maskedPhone }}<span>Click to show</span></h3>
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
                                <h4>{{ $product->vendor?->VR_Name ?? 'N/A' }}</h4>
                                <h5>{{ optional($product->vendor?->created_at)->format('F j, Y') ?? 'N/A' }}</h5>
                                <p>{{ $product->vendor?->VR_Type ?? 'N/A' }}</p>
                            </div>
                            <div class="author-widget">
                                <button type="button" title="Follow" class="follow fas fa-heart"></button>
                                <button type="button" title="Number" class="fas fa-phone" data-bs-toggle="modal"
                                    data-bs-target="#number"></button>
                            </div>
                            <ul class="author-list">
                                <li>
                                    <h6>total ads</h6>
                                    <p>{{ $product->vendor?->products()->count() ?? 0 }}</p>
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
                            <li class="breadcrumb-item">
                                <a>{{ $product->subcategory->SC_Name ?? ($product->category->CT_Name ?? 'Product') }}</a>
                            </li>
                        </ol>
                        <h5 class="ad-details-address">{{ $product->display_location }}</h5>
                        <h3 class="ad-details-title">{{ $product->display_title }}</h3>

                        <div class="ad-details-slider-group">
                            <div class="ad-details-slider slider-arrow">
                                @forelse (($product->display_gallery ?? collect()) as $img)
                                    <div><img src="{{ $img }}" alt="details"></div>
                                @empty
                                    <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                                    <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                                    <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                                    <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                                @endforelse
                            </div>
                            <div class="cross-vertical-badge ad-details-badge">
                                <i class="fas fa-clipboard-check"></i>
                                <span>recommend</span>
                            </div>
                        </div>
                        <div class="ad-thumb-slider">
                            @forelse (($product->display_gallery ?? collect()) as $img)
                                <div><img src="{{ $img }}" alt="details"></div>
                            @empty
                                <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                                <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                                <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                                <div><img src="/storage/images/product/01.jpg" alt="details"></div>
                            @endforelse
                        </div>
                    </div>

                    <!-- SPECIFICATION CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">Specification</h5>
                        </div>
                        <ul class="ad-details-specific">
                            @foreach ($d as $key => $value)
                                @continue(in_array($key, $excludedKeys) || $value === null || $value === '')
                                <li>
                                    <h6>{{ Str::lower($key) }}:</h6>
                                    @if(preg_match('/^#[a-fA-F0-9]{6}$/', $value))
                                        <p style="display: flex; align-items: center;">
                                            {{ getClosestColorName($value) }}
                                            <span style="display:inline-block; width:14px; height:14px; background-color:{{$value}}; border-radius:50%; margin-left:8px; border: 1px solid #ccc;"></span>
                                        </p>
                                    @else
                                        <p>{{ $value }}</p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- DESCRIPTION CARD -->
                    <div class="common-card">
                        <div class="card-header">
                            <h5 class="card-title">description</h5>
                        </div>
                        <p class="ad-details-desc">{{ $d['Description'] ?? 'No description provided.' }}</p>
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
                        <p>Explore more premium properties and listings across Dubai and the UAE from Launch.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="related-slider slider-arrow">
                        @forelse ($related as $item)
                            @php $rd = $item->PR_Details; @endphp
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-img">
                                        @if (!empty($rd['Main Image']))
                                            <img src="/storage/uploads/products/{{ $rd['Main Image'] }}" alt="product">
                                        @else
                                            <img src="/storage/images/product/01.jpg" alt="product">
                                        @endif
                                    </div>
                                    <div class="product-type">
                                        <span class="flat-badge sale">sale</span>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <ol class="breadcrumb product-category">
                                        <li><i class="fas fa-tags"></i></li>
                                        <li class="breadcrumb-item">
                                            <a
                                                href="{{ route('addetails', \Vinkla\Hashids\Facades\Hashids::encode($item->PR_Id)) }}">{{ $item->display_badge }}</a>
                                        </li>
                                    </ol>
                                    <h5 class="product-title">
                                        <a href="{{ route('addetails', \Vinkla\Hashids\Facades\Hashids::encode($item->PR_Id)) }}">{{ $item->display_title }}</a>
                                    </h5>
                                    <div class="product-meta">
                                        <span><i class="fas fa-map-marker-alt"></i>{{ $item->display_location }}</span>
                                        <span><i class="fas fa-clock"></i>{{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-price">{{ $item->display_price }}</h5>
                                        <div class="product-btn">
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No related ads found yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-50">
                        <a class='btn btn-inline' href='{{ route('categorylist') }}'>
                            <i class="fas fa-eye"></i>
                            <span>view all related</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                                RELATED PART END
                    =======================================-->

    <div class="modal fade" id="number">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Contact this Number</h4>
                    <button class="fas fa-times" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h3 class="modal-number">{{ $phone }}</h3>
                </div>
            </div>
        </div>
    </div>


    @include('includes.footer')
@endsection

