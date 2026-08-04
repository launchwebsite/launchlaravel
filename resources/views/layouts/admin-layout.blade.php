<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <title>Launch INCS | Admin Panel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="/storage/images/favicon.png">

    <!-- CSS -->
    <link href="/storage/admin/assets/libs/simple-datatables/style.css" rel="stylesheet">
    <link href="/storage/admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/storage/admin/assets/css/icons.min.css" rel="stylesheet">
    <link href="/storage/admin/assets/css/app.min.css" rel="stylesheet">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="background-admin">

    @yield('content')

    <!-- Bootstrap -->
    <script src="/storage/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugins -->
    <script src="/storage/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/storage/admin/assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/storage/admin/assets/js/pages/datatable.init.js"></script>
    <script src="/storage/admin/assets/js/app.js"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "newestOnTop": true,
            "preventDuplicates": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "300",
            "timeOut": "3000",
            "extendedTimeOut": "500",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif

        @if (session('info'))
            toastr.info("{{ session('info') }}");
        @endif
    </script>

    <script>
        document.querySelectorAll('.toggle-password').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const input = document.getElementById(this.dataset.target);
                const icon = this.querySelector('i');
                const isHidden = input.type === 'password';

                input.type = isHidden ? 'text' : 'password';
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        });
    </script>

    <script>
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("userpassword");

        if (togglePassword && password) {
            togglePassword.addEventListener("click", function() {
                if (password.type === "password") {
                    password.type = "text";
                    this.innerHTML = '<i class="fas fa-eye-slash"></i>';
                } else {
                    password.type = "password";
                    this.innerHTML = '<i class="fas fa-eye"></i>';
                }
            });
        }
    </script>

</body>

</html>
