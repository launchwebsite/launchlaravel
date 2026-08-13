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
                    <div class="single-content green-head">
                        <h2>Job Opening</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                      SINGLE BANNER PART END
            =======================================-->


    <!--=====================================
                         PRICE PART START
            =======================================-->
    <section class="price-part">
        <div class="container">
            <div class="row">
                @foreach ($careers as $career)
                    <div class="col-md-6 col-lg-4">
                        <div class="job-card">

                        <div class="d-flex justify-content-between align-items-start">
                            <span class="easy-apply text-warning">{{ $career->CR_Type}}</span>

                                <div class="job-icons">
                                    <a href="#"><i class="far fa-bookmark"></i></a>
                                    <a href="#"><i class="far fa-thumbs-down"></i></a>
                                </div>
                            </div>

                            <h3 class="job-title">{{ $career->CR_Name }}</h3>

                            <p class="company-name">
                                {{ $career->CR_Company }}
                            </p>

                            <p class="location">
                                {{ $career->CR_Location }}
                            </p>

                            <div class="job-tags">
                                <span class="salary">{{ $career->CR_SalaryRange }}</span>

                                <span class="fulltime">
                                    <i class="fas fa-check"></i> {{ $career->CR_Type }}
                                </span>
                            </div>

                        <div class="jobby">
                            <a href="{{ route('applyjob') }}" class="btn btn-outline-warning btn-sm">Apply Now</a>
                        </div>

                        </div>
                    </div>
                @endforeach


            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="section-center-heading">
                        <h2 class="text-white">Do you have something to advertise?</h2>
                        <p class="text-white">Reach thousands of buyers across the UAE. Post your ad in
                            minutes and connect with the right audience.</p>
                        <a class='btn btn-outline mt-3' href="{{ route('adpost') }}">
                            <i class="fas fa-plus-circle"></i>
                            <span>post your ad</span>
                        </a>
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
