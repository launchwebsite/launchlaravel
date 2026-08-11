<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="dark">

<head>

    <meta charset="utf-8" />
    <title>Launch INCS | Vendor Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/storage/images/favicon.png" alt="Company Logo">
    <link href="/vendor/assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="/vendor/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/vendor/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/vendor/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/f.min.css" rel="stylesheet"  />
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    @include('vendor-layout.navbar')
    @include('vendor-layout.sidebar')
    @yield('content')

    <!-- Javascript  -->
    <script src="/vendor/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/vendor/assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/vendor/assets/js/pages/datatable.init.js"></script>
    <script src="/vendor/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>

</body>

</html>
