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
        const submitPaymentResponse = function(response, fallbackStatus) {
            try {
                let params = new URLSearchParams();
                params.append('status', fallbackStatus);
                params.append('merchantReferenceId', "{{ $merchantReferenceId }}");
                
                if (response && typeof response === 'object') {
                    if (response.status) params.set('status', response.status);
                    if (response.responseCode) params.append('responseCode', response.responseCode);
                    if (response.responseMessage) params.append('responseMessage', response.responseMessage);
                    if (response.detailedResponseMessage) params.append('detailedResponseMessage', response.detailedResponseMessage);
                    if (response.orderId) params.append('orderId', response.orderId);
                }
                
                window.location.href = "{{ $callbackUrl }}?" + params.toString();
            } catch (err) {
                console.error("Error formatting response", err);
                window.location.href = "{{ $callbackUrl }}?status=" + fallbackStatus + "&merchantReferenceId={{ $merchantReferenceId }}";
            }
        };

        const onSuccess = function(response) {
            console.log('Payment success', response);
            submitPaymentResponse(response, 'success');
        };
        const onError = function(response) {
            console.error('Payment error', response);
            submitPaymentResponse(response, 'error');
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
