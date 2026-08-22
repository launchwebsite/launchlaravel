@extends('layouts.layout')

@section('content')

<!-- Checkout Header -->
<header class="py-0 border-bottom text-center" style="background-color: #000; border-color: #333 !important;">
    <div class="container py-3">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-decoration-none">
            <img src="{{ asset('storage/images/logo.png') }}" alt="Launch Logo" style="height: 100px; width: auto;">
        </a>
    </div>
</header>

<!-- Payment Method Selection Section -->
<section class="py-5" style="background-color: #000; min-height: calc(100vh - 100px); color: #fff;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                
                <h3 class="mb-4 text-center fw-bold text-white">Select Payment Method</h3>
                
                <div class="p-4 rounded shadow-sm border mb-4" style="background-color: #111; border-color: #333 !important;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted fw-bold">Amount to Pay</span>
                        <h4 class="fw-bold mb-0 text-white" id="display-total">AED {{ number_format($total ?? 0, 2) }}</h4>
                    </div>
                </div>

                <form action="{{ route('payment.initiate') }}" method="POST" id="paymentMethodForm">
                    @csrf
                    
                    <!-- Pass along the hidden inputs from the previous step -->
                    <input type="hidden" name="PR_Id" value="{{ $PR_Id ?? '' }}">
                    @if(isset($premium_package))
                        <input type="hidden" name="premium_package" value="{{ $premium_package }}">
                    @endif
                    @if(isset($feature_package))
                        <input type="hidden" name="feature_package" value="{{ $feature_package }}">
                    @endif

                    <!-- Payment Options -->
                    <div class="p-4 rounded shadow-sm border" style="background-color: #111; border-color: #333 !important;">
                        
                        <!-- Credit/Debit Card Option (Geidea) -->
                        <div class="payment-method-card border rounded p-3 mb-3 d-flex justify-content-between align-items-center" style="border-color: #ffc107 !important; background-color: #1a1a1a;">
                            <div class="form-check w-100">
                                <input class="form-check-input" type="radio" name="payment_method" id="method-geidea" value="geidea" checked style="accent-color: #ffc107; cursor: pointer;">
                                <label class="form-check-label fw-bold ms-2 w-100 d-flex align-items-center" for="method-geidea" style="cursor: pointer;">
                                    Credit / Debit Card
                                    <div class="ms-auto d-flex gap-2">
                                        <i class="las la-credit-card fs-4 text-warning"></i>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Pay Later / Bank Transfer Option (Placeholder) -->
                        <div class="payment-method-card border rounded p-3 d-flex justify-content-between align-items-center opacity-50" style="border-color: #333 !important;">
                            <div class="form-check w-100">
                                <input class="form-check-input" type="radio" name="payment_method" id="method-bank" value="bank" disabled>
                                <label class="form-check-label fw-bold ms-2 w-100 d-flex align-items-center" for="method-bank">
                                    Bank Transfer (Coming Soon)
                                    <div class="ms-auto">
                                        <i class="las la-university fs-4 text-muted"></i>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn w-100 py-3 fw-bold fs-5" id="proceed-button">
                            Proceed to Payment
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</section>

<style>
    body {
        background-color: #000;
        color: #fff;
    }
    
    #proceed-button {
        background-color: #ffc107 !important;
        border-color: #ffc107 !important;
        color: #000000 !important;
        transition: all 0.3s ease;
    }
    #proceed-button:hover {
        background-color: #e0a800 !important;
        border-color: #e0a800 !important;
        color: #000000 !important;
    }
    
    .payment-method-card {
        transition: all 0.3s ease;
    }
    .payment-method-card:hover {
        border-color: #555 !important;
    }
</style>

@endsection
