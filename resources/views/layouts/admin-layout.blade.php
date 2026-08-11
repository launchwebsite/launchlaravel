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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

    {{-- <script>
        $('#subcategory').on('change', function() {

            let subCategoryId = $(this).val();

            $.ajax({
                url: '/subcategory/' + subCategoryId + '/attributes',
                type: 'GET',

                success: function(response) {

                    let html = '';

                    response.forEach(function(attribute) {

                        html += `
                        <div class="mb-3 row">

                            <label class="col-sm-2 col-form-label">
                                ${attribute.AT_Inputs}
                            </label>

                            <div class="col-sm-10">

                                <input
                                    type="${attribute.AT_Structure}"
                                    name="AT_Inputs[${attribute.AT_Id}]"
                                    class="form-control"
                                    placeholder="Enter ${attribute.AT_Inputs}">

                            </div>

                        </div>
                    `;
                    });

                    $('#attribute-container').html(html);
                }
            });

        });
    </script>

    <script>
        $('#category').on('change', function() {

            let categoryId = $(this).val();

            $('#subcategory').html(
                '<option value="">Loading...</option>'
            );

            $.ajax({

                url: '/category/' + categoryId + '/subcategories',

                type: 'GET',

                success: function(response) {

                    let options =
                        '<option value="">Select Sub Category</option>';

                    response.forEach(function(subcategory) {

                        options +=
                            `<option value="${subcategory.SC_Id}">
                            ${subcategory.SC_Name}
                        </option>`;
                    });

                    $('#subcategory').html(options);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            // Hide all attributes initially
            $('.attribute-row').hide();

            // Category change
            $('#category').change(function() {

                let categoryId = $(this).val();

                $('#subcategory').val('');
                $('#subcategory-error').text('');

                $('.attribute-row').hide();

                if (categoryId === '') {

                    $('#subcategory').prop('disabled', true);

                    $('#subcategory option').hide();
                    $('#subcategory option:first').show();

                    return;
                }

                $('#subcategory').prop('disabled', false);

                $('#subcategory option').hide();
                $('#subcategory option:first').show();

                $('#subcategory option').each(function() {

                    if ($(this).data('category') == categoryId) {
                        $(this).show();
                    }

                });

            });

            // Subcategory change
            $('#subcategory').change(function() {

                let categoryId = $('#category').val();

                if (categoryId === '') {

                    $('#subcategory-error').text(
                        'Please select a category first.'
                    );

                    $(this).val('');

                    return;
                }

                $('#subcategory-error').text('');

                let subCategoryId = $(this).val();

                $('.attribute-row').hide();

                $('.attribute-row').each(function() {

                    if ($(this).data('subcategory') == subCategoryId) {

                        $(this).show();

                    }

                });

            });

        });
    </script> --}}

</body>

</html>
