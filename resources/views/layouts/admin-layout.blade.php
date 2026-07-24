<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <title>Launch INCS | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/images/favicon.png" alt="Company Logo">
    <link href="/storage/admin/assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="/storage/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/storage/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/storage/admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/f.min.css" rel="stylesheet"  />
</head>

<body class="background-admin">

    @yield('content')

    <!-- Javascript  -->
    <script src="/storage/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/storage/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/storage/admin/assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/storage/admin/assets/js/pages/datatable.init.js"></script>
    <script src="/storage/admin/assets/js/app.js"></script>
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
    {{-- <script>
        document.getElementById('togglemenu').addEventListener('click', function() {
            document.getElementById('brandLogo').classList.toggle('logo-condensed');
        });
    </script> --}}
    {{-- <script>
        document.getElementById('togglemenu').addEventListener('click', function() {
            const body = document.body;
            const current = body.getAttribute('data-sidebar-size');
            body.setAttribute('data-sidebar-size', current === 'condensed' ? 'default' : 'condensed');
        });
    </script> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#BD_Para1'))
            .catch(error => {

                console.error(error);
            });
    </script> --}}
</body>
<!--end body-->

</html>
