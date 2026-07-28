<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="light">


<!-- Mirrored from mannatthemes.com/Launch Incs/default-dark/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jul 2025 12:09:31 GMT -->

<head>


    <meta charset="utf-8" />
    <title>Launch Incs | Admin-Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.png">


    <!-- App css -->
    <link href="/vendor/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/vendor/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/vendor/assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>


<!-- Top Bar Start -->

<body>
    <div class="container-xxl"
        style="background-image: url('{{ asset('/vendor/vendor-banner.png') }}');
     background-size: cover;
     background-position: center;
     background-repeat: no-repeat;
     height: 100vh;">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                    <div class="text-center p-3">
                                        <a href="#" class="logo logo-admin">
                                            <img src="{{ asset('/vendor/logo.png') }}" height="50" alt="logo"
                                                class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Let's Get Started Launch Incs
                                        </h4>
                                        <p class="text-muted fw-medium mb-0">vendor Login</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <form id="sign_in" method="POST" action="{{ route('login.submit') }}">
                                        @csrf
                                        @if ($errors->has('login_error'))
                                            <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
                                        @endif
                                        <div class="form-group mb-2 mt-3">
                                            <label class="form-label" for="username">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Enter Your Email" required autofocus>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div><!--end form-group-->

                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                id="userpassword" placeholder="Enter password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror


                                        </div>


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
</body>
<!--end body-->

<!-- Mirrored from mannatthemes.com/rizz/default-dark/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jul 2025 12:09:31 GMT -->

</html>
