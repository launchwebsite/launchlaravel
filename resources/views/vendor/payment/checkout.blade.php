@extends('layouts.layout')

@section('content')
<div class="container py-5 text-center">
    <h3>Initializing Payment Gateway...</h3>
    <p>Please wait while we redirect you to the secure payment page.</p>
</div>

<!-- Load Geidea Checkout SDK -->
<script src="{{ config('services.geidea.hpp_url', 'https://payments.geidea.ae/hpp/geideaCheckout.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof geideaCheckout === 'undefined') {
            alert('Failed to load payment gateway. Please check your connection and try again.');
            return;
        }

        // Initialize Geidea Checkout
        const paymentSession = new geideaCheckout({
            sessionId: "{{ $sessionId }}",
            returnUrl: "{{ $callbackUrl }}",
        });

        paymentSession.start();
    });
</script>
@endsection
