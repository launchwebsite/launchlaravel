<!DOCTYPE html>
<html lang="en">

<head>
    <!--=====================================
                    META-TAG PART START
        =======================================-->
    <!-- REQUIRE META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- TEMPLATE META -->
    <meta name="name" content="Launch">
    <meta name="type" content="Launch">
    <meta name="title" content="Launch">
    <meta name="keywords"
        content="Launch, Launch, ads, Launch ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
    <!--=====================================
                    META-TAG PART END
        =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>Launch</title>



    @vite(['resources/js/app.js','resources/css/app.css'])

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- FAVICON -->
    <link rel="icon" href="/storage/images/favicon.png">

    <!-- FONTS -->
    <link rel="stylesheet" href="/storage/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/storage/fonts/font-awesome/fontawesome.css">

    <!-- VENDOR -->
    <link rel="stylesheet" href="/storage/css/vendor/slick.min.css">
    <link rel="stylesheet" href="/storage/css/vendor/bootstrap.min.css">

    <!-- CUSTOM -->
    <link rel="stylesheet" href="/storage/css/custom/main.css">
    <link rel="stylesheet" href="/storage/css/custom/index.css">
    <link rel="stylesheet" href="/storage/css/custom/contact.css">
    <link rel="stylesheet" href="/storage/css/custom/user-form.css">
    <link rel="stylesheet" href="/storage/css/custom/ad-details.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- <link rel="stylesheet" href="/storage/css/custom/price.css"> -->
    <!--=====================================
                    CSS LINK PART END
        =======================================-->

</head>

<body>


    <!-- ============================================
         LOCATION PERMISSION MODAL
         ============================================ -->
    <div id="locationPermModal" class="loc-perm-overlay" style="display:none;">
        <div class="loc-perm-modal">
            <!-- Animated pin icon -->
            <div class="loc-perm-icon">
                <span class="loc-perm-pulse"></span>
                <i class="fas fa-map-marker-alt"></i>
            </div>

            <h4 class="loc-perm-title">Enable Location Access</h4>
            <p class="loc-perm-desc">
                Allow <strong>Launch</strong> to use your location to show you
                products and jobs <em>near you</em> in Dubai.
            </p>

            <div class="loc-perm-actions">
                <button id="locPermAllow" class="loc-perm-btn loc-perm-allow">
                    <i class="fas fa-crosshairs"></i> Allow Location
                </button>
                <button id="locPermSkip" class="loc-perm-btn loc-perm-skip">
                    Skip for now
                </button>
            </div>

            <p class="loc-perm-note">
                <i class="fas fa-shield-alt"></i>
                Your location is only used to filter results — we never store it.
            </p>
        </div>
    </div>

    <!-- Detecting toast -->
    <div id="locDetectingToast" class="loc-detecting-toast" style="display:none;">
        <div class="loc-toast-spinner"></div>
        <span>Detecting your location…</span>
    </div>

    <!-- Success toast -->
    <div id="locSuccessToast" class="loc-success-toast" style="display:none;">
        <i class="fas fa-check-circle"></i>
        <span id="locSuccessMsg">Showing results near you</span>
    </div>

    @yield('content')



    <div class="whatsapp">
        <a href="https://wa.me/971564527879 " text="Hello, I'm interested." target="_blank">
            <img src="/whatsapp.gif" alt="Hello, I'm interested.">
        </a>
    </div>

    <!-- Call -->
    <div class="call">
        <a href="tel:+971564527879">
            <img src="/call.gif" alt="Call">
        </a>
    </div>

    <!--=====================================
                    JS LINK PART START
        =======================================-->
    <!-- VENDOR -->
    <script src="/storage/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/storage/js/vendor/popper.min.js"></script>
    <script src="/storage/js/vendor/bootstrap.min.js"></script>
    <script src="/storage/js/vendor/slick.min.js"></script>

    <!-- CUSTOM -->
    <script src="/storage/js/custom/slick.js"></script>
    <script src="/storage/js/custom/main.js"></script>
    <!--=====================================
                    JS LINK PART END
        =======================================-->
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

