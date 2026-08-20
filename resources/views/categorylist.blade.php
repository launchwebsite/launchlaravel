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
            <div class="row justify-content-center g-4">
                @foreach ($categories as $item)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">

                        <div class="category-card golden bluee">

                            <div class="category-head">

                                <img src="/storage/uploads/categories/{{ $item->CT_Img }}" alt="{{ $item->CT_Name }}">

                                @if (strtolower(trim($item->CT_Name)) === 'jobs')
                                    <a href="{{ route('jobopening', ['category' => \Vinkla\Hashids\Facades\Hashids::encode($item->CT_Id)]) }}" class="category-content">
                                @else
                                    <a href="{{ route('categorydetails', ['category' => \Vinkla\Hashids\Facades\Hashids::encode($item->CT_Id)]) }}" class="category-content">
                                @endif

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

                                        @if (strtolower(trim($item->CT_Name)) === 'jobs')
                                            <a href="{{ route('jobopening', ['subcategory' => \Vinkla\Hashids\Facades\Hashids::encode($subcategory->SC_Id)]) }}">
                                        @else
                                            <a href="{{ route('categorydetails', ['subcategory' => \Vinkla\Hashids\Facades\Hashids::encode($subcategory->SC_Id)]) }}">
                                        @endif

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
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="center-20">
                        <a href="{{ route('categorydetails') }}" class="btn btn-inline btn-blue">
                            <i class="fas fa-eye"></i>
                            <span>show more categories</span>
                        </a>
                    </div>
                </div>
            </div> --}}
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
                        <p>Reach thousands of buyers across the UAE with Launch - the region's trusted marketplace for
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


    @include('includes.pricing')

    @include('includes.footer')
@endsection

