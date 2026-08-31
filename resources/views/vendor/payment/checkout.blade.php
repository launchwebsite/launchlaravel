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
        if (typeof GeideaCheckout === 'undefined') {
            alert('Failed to load payment gateway. Please check your connection and try again.');
            return;
        }

        // Initialize Geidea Checkout
        const onSuccess = function(response) {
            // Geidea will naturally redirect to the returnUrl, but we can also handle it here
            console.log('Payment success', response);
            window.location.href = "{{ $callbackUrl }}?status=success";
        };
        const onError = function(response) {
            console.error('Payment error', response);
            window.location.href = "{{ $callbackUrl }}?status=error";
        };
        const onCancel = function() {
            console.log('Payment cancelled');
            window.location.href = "{{ route('package.selection', ['PR_Id' => $prId]) }}";
        };

        const paymentSession = new GeideaCheckout(onSuccess, onError, onCancel);
        paymentSession.startPayment("{{ $sessionId }}");
    });
</script>
@endsection
