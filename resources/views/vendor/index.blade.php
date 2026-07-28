@extends('vendor-layout.app')
@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                                    <div class="col-9">
                                        <p class="text-primary mb-0 fw-semibold fs-14">Service</p>
                                        <h3 class="mt-2 mb-0 fw-bold">3</h3>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                            <i class="iconoir-hexagon-dice h1 align-self-center mb-0 text-secondary"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                                    <div class="col-9">
                                        <p class="text-secondary mb-0 fw-semibold fs-14">Service Categories</p>
                                        <h3 class="mt-2 mb-0 fw-bold">3</h3>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                            <i class="iconoir-clock h1 align-self-center mb-0 text-secondary"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                                    <div class="col-9">
                                        <p class="text-warning mb-0 fw-semibold fs-14">Blogs</p>
                                        <h3 class="mt-2 mb-0 fw-bold">12</h3>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                            <i
                                                class="iconoir-percentage-circle h1 align-self-center mb-0 text-secondary"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>


                    <!--end col-->
                </div>
                <!--end row-->




                <!--end row-->
            </div><!-- container -->





            @include('vendor.footer')

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->
@endsection
