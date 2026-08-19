@extends('vendor-layout.app')
@section('content')
    <div class="page-wrapper">
        {{-- @if (Auth::check() && Auth::user()->VR_Status == 0) --}}
        @if (Auth::guard('vendor')->check() && in_array(Auth::guard('vendor')->user()->VR_Status, [0, 2]))
            <!-- Approval Pending Modal -->
            <div class="modal fade" id="approvalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="approvalModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header bg-warning">
                            <h5 class="modal-title text-dark" id="approvalModalLabel">
                                {{ Auth::guard('vendor')->user()->VR_Status == 2 ? 'Account On Hold' : 'Account Approval Pending' }}
                            </h5>
                        </div>

                        <div class="modal-body text-center">
                            <i class="fas fa-clock fa-3x text-warning mb-3"></i>

                            @if (Auth::guard('vendor')->user()->VR_Status == 2)
                                <h5>Account On Hold</h5>

                                <p class="mb-0">
                                    Your vendor account has been placed on hold by the administrator.
                                    Please contact support for more information.
                                </p>
                            @else
                                <h5>Admin Approval Required</h5>

                                <p class="mb-0">
                                    Your vendor registration request is currently under review.
                                    Please wait until the administrator approves your account.
                                </p>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <a href="{{ route('vendor.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn btn-danger">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('vendor.logout') }}" method="POST"
                                style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endif
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
                                        <h3 class="mt-2 mb-0 fw-bold">0</h3>
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
                                        <p class="text-secondary mb-0 fw-semibold fs-14">product category</p>
                                        <h3 class="mt-2 mb-0 fw-bold">0</h3>
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
                                        <p class="text-warning mb-0 fw-semibold fs-14">Products</p>
                                        <h3 class="mt-2 mb-0 fw-bold">0</h3>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var approvalModal = new bootstrap.Modal(document.getElementById('approvalModal'));
            approvalModal.show();
        });
    </script>
@endsection

