@extends('layouts.admin-layout')
@section('content')
    <div class="container-fluid"
        style="background-image: url('/storage/admin/assets/images/admin.jpg');
     background-size: cover;
     background-position: center;
     background-repeat: no-repeat;
     height: 100%;">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box rounded-top bg-black">
                                    <div class="text-center p-3 auth-main">
                                        <a href="{{ route('home') }}" class="logo logo-admin">
                                            <img src="/storage/admin/logo.png" height="50" alt="logo"
                                                class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white fs-18 auth-name">Launch INCS</h4>
                                        <p class="text-muted fw-medium mb-0">Admin Login</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <form id="sign_in" method="POST" action="{{ route('login.user') }}">
                                        @csrf
                                        @if ($errors->has('login_error'))
                                            <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
                                        @endif
                                        <div class="form-group mb-2 mt-3">
                                            <label class="form-label" for="username">Email or Username</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Enter Email or Username" required autofocus autocomplete="off">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        {{-- <div class="form-group">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password" id="userpassword"
                                                placeholder="Enter password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <div class="form-group">
                                            <label class="form-label">Password</label>

                                            <div class="password-wrapper">
                                                <input type="password" class="form-control" name="password"
                                                    id="userpassword" placeholder="Enter password">

                                                <span id="togglePassword" class="password-toggle">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>

                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group row mt-3">
                                            <div class="col-sm-6">
                                                {{-- <div class="form-check form-switch form-switch-success">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="customSwitchSuccess">
                                                    <label class="form-check-label" for="customSwitchSuccess">Remember
                                                        me</label>
                                                </div> --}}
                                            </div><!--end col-->


                                        </div><!--end form-group-->

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit">Log In <i
                                                            class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->

                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- container -->
@endsection
