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
                                    <li class="breadcrumb-item"><a href='category-list.php'>Category List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Category Details</li>
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
                                <form class="product-widget-form" action="{{ route('categorydetails') }}" method="GET">
                                    @foreach(request()->except(['location', 'page']) as $key => $value)
                                        @if(is_array($value))
                                            @foreach($value as $v)
                                                <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                                            @endforeach
                                        @else
                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                        @endif
                                    @endforeach
                                    <div class="product-widget-search">
                                        <input type="text" placeholder="Search">
                                    </div>
                                    <ul class="product-widget-list product-widget-scroll">
                                        @foreach($topLocations as $loc => $count)
                                            <li class="product-widget-item">
                                                <div class="product-widget-checkbox">
                                                    <input type="checkbox" id="loc-{{ $loop->index }}" name="location[]" value="{{ $loc }}" onchange="this.form.submit()" {{ in_array($loc, request('location', [])) ? 'checked' : '' }}>
                                                </div>
                                                <label class="product-widget-label" for="loc-{{ $loop->index }}">
                                                    <span class="product-widget-text">{{ $loc }}</span>
                                                    <span class="product-widget-number">({{ $count }})</span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('categorydetails', request()->only(['category', 'subcategory'])) }}" class="product-widget-btn" style="text-decoration:none;">
                                        <i class="fas fa-broom"></i>
                                        <span>Clear Filter</span>
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="product-widget">
                                <h6 class="product-widget-title">Filter by Popularity</h6>
                                <form class="product-widget-form" action="{{ route('categorydetails') }}" method="GET">
                                    @foreach(request()->except(['popularity', 'page']) as $key => $value)
                                        @if(is_array($value))
                                            @foreach($value as $v)
                                                <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                                            @endforeach
                                        @else
                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                        @endif
                                    @endforeach
                                    <div class="product-widget-search">
                                        <input type="text" placeholder="Search">
                                    </div>
                                    <ul class="product-widget-list product-widget-scroll">
                                        @foreach($popularSubcategories as $subcat)
                                            <li class="product-widget-item">
                                                <div class="product-widget-checkbox">
                                                    <input type="checkbox" id="pop-{{ $loop->index }}" name="popularity[]" value="{{ \Vinkla\Hashids\Facades\Hashids::encode($subcat->SC_Id) }}" onchange="this.form.submit()" {{ in_array(\Vinkla\Hashids\Facades\Hashids::encode($subcat->SC_Id), request('popularity', [])) ? 'checked' : '' }}>
                                                </div>
                                                <label class="product-widget-label" for="pop-{{ $loop->index }}">
                                                    <span class="product-widget-text">{{ $subcat->SC_Name }}</span>
                                                    <span class="product-widget-number">({{ $subcat->products_count }})</span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('categorydetails', request()->only(['category', 'subcategory'])) }}" class="product-widget-btn" style="text-decoration:none;">
                                        <i class="fas fa-broom"></i>
                                        <span>Clear Filter</span>
                                    </a>
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
                                        @foreach ($categories as $category)
                                            <li class="product-widget-dropitem">
                                                <button type="button" class="product-widget-link">
                                                    <i class="fas fa-tags"></i>
                                                    {{ $category->CT_Name }} ({{ $category->products_count }})
                                                </button>
                                                <ul class="product-widget-dropdown">
                                                    @foreach ($category->subcategories as $subcategory)
                                                        <li>
                                                            <a href="{{ route('categorydetails', ['subcategory' => \Vinkla\Hashids\Facades\Hashids::encode($subcategory->SC_Id)]) }}">
                                                                {{ $subcategory->SC_Name }} ({{ $subcategory->products_count }})
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('categorydetails', request()->only(['category', 'subcategory'])) }}" class="product-widget-btn" style="text-decoration:none;">
                                        <i class="fas fa-broom"></i>
                                        <span>Clear Filter</span>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('categorydetails') }}" method="GET" class="header-filter">
                                @foreach(request()->except(['show', 'sort', 'page']) as $key => $value)
                                    @if(is_array($value))
                                        @foreach($value as $v)
                                            <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endif
                                @endforeach
                                <button type="button" class="flex items-center filter-btn">
                                    <i class="fas fa-filter"></i>
                                    <span class="text-capitalize">Filter</span>
                                </button>
                                <div class="filter-show">
                                    <label class="filter-label">Show :</label>
                                    <select class="form-select filter-select" name="show" onchange="this.form.submit()">
                                        <option value="12" {{ request('show') == 12 ? 'selected' : '' }}>12</option>
                                        <option value="24" {{ request('show') == 24 ? 'selected' : '' }}>24</option>
                                        <option value="36" {{ request('show') == 36 ? 'selected' : '' }}>36</option>
                                    </select>
                                </div>
                                <div class="filter-short">
                                    <label class="filter-label">Sort by :</label>
                                    <select class="form-select filter-select" name="sort" onchange="this.form.submit()">
                                        <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Default</option>
                                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price (Low to High)</option>
                                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price (High to Low)</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($products as $product)
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="product-card">
                                    <div class="product-media">
                                        <div class="product-img">
                                            @if($product->display_gallery->isNotEmpty())
                                                <img src="{{ $product->display_gallery->first() }}" alt="{{ $product->display_title }}">
                                            @else
                                                <img src="/storage/images/product/01.jpg" alt="No image">
                                            @endif
                                        </div>
                                        <div class="product-type">
                                            <span class="flat-badge sale">{{ strtolower($product->display_badge) }}</span>
                                        </div>
                                        <ul class="product-action">
                                            <li class="view"><i class="fas fa-eye"></i><span>0</span></li>
                                            <li class="rating"><i class="fas fa-star"></i><span>0/5</span></li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <ol class="breadcrumb product-category">
                                            <li><i class="fas fa-tags"></i></li>
                                            <li class="breadcrumb-item"><a href="#">{{ $product->display_badge }}</a></li>
                                        </ol>
                                        <h5 class="product-title">
                                            <a href="{{ route('addetails', \Vinkla\Hashids\Facades\Hashids::encode($product->PR_Id ?? 1)) }}">{{ $product->display_title }}</a>
                                        </h5>
                                        <div class="product-meta">
                                            <span><i class="fas fa-map-marker-alt"></i>{{ $product->PR_Details['Location'] ?? 'UAE' }}</span>
                                            <span><i class="fas fa-clock"></i>{{ $product->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-price">{{ $product->display_price }}</h5>
                                            <div class="product-btn">
                                                <button type="button" title="Wishlist" class="far fa-heart"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center mt-5" style="margin-bottom: 50px;">
                                <h4 style="color: white;">No products found in this category.</h4>
                            </div>
                        @endforelse
                    </div>
                    @if($products->hasPages())
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="footer-pagection">
                                {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    @endif
            </div>
        </div>
    </section>
    <!--=====================================
                        AD LIST PART END
            =======================================-->

    @include('includes.footer')

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInputs = document.querySelectorAll('.product-widget-search input');
        
        searchInputs.forEach(input => {
            input.addEventListener('input', function() {
                const filter = this.value.toLowerCase();
                const widget = this.closest('.product-widget');
                const list = widget.querySelector('.product-widget-list');
                const listItems = list.querySelectorAll(':scope > li');
                let hasMatch = false;
                
                const oldMsg = widget.querySelector('.no-match-msg');
                if (oldMsg) oldMsg.remove();

                listItems.forEach(li => {
                    const text = li.textContent.toLowerCase();
                    if (text.includes(filter)) {
                        li.style.display = '';
                        hasMatch = true;
                    } else {
                        li.style.display = 'none';
                    }
                });

                if (!hasMatch && filter.trim() !== '') {
                    const msg = document.createElement('li');
                    msg.className = 'no-match-msg';
                    msg.textContent = 'No results found';
                    msg.style.color = 'var(--primary)'; 
                    msg.style.padding = '10px 0';
                    msg.style.textAlign = 'center';
                    msg.style.fontSize = '14px';
                    msg.style.fontWeight = '500';
                    msg.style.listStyle = 'none';
                    
                    list.appendChild(msg);
                }
            });
        });
    });
    </script>
@endsection

