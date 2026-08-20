@extends('layouts.layout')

@section('content')
@include('includes.header')
<!-- Package Selection Section -->
<section class="package-selection-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-7 mb-4">
                <div class="bg-white p-4 rounded shadow-sm border">
                    <h3 class="mb-4 text-center fw-bold">Select a package that works for you</h3>
                    
                    <!-- Standard Package -->
                    <div class="package-card border rounded p-3 mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="0" id="standardPackage" checked disabled>
                            <label class="form-check-label fw-bold ms-2" for="standardPackage">
                                Keep it Standard<br>
                                <small class="text-muted fw-normal">Normal visibility</small>
                            </label>
                        </div>
                        <div class="fw-bold text-danger">FREE</div>
                    </div>

                    <!-- Premium Package -->
                    <div class="package-card border rounded p-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="fw-bold mb-0">Premium Ad <span class="badge bg-success rounded-pill ms-2">NEW</span></h5>
                            <span class="badge bg-warning text-dark rounded-pill">PREMIUM</span>
                        </div>
                        <p class="text-muted small mb-3">Premium ads are placed on top of all ads</p>
                        
                        <!-- Premium active border style when checked -->
                        <div class="border border-danger rounded p-3 d-flex justify-content-between align-items-center" id="premiumContainer">
                            <div class="form-check">
                                <input class="form-check-input package-option" type="checkbox" name="premium_package" id="premium7" value="77" data-name="Premium Ad for 7 days">
                                <label class="form-check-label fw-bold ms-2" for="premium7">
                                    Premium Ad for 7 days
                                </label>
                            </div>
                            <div class="fw-bold">AED 77</div>
                        </div>
                    </div>

                    <!-- Feature Package -->
                    <div class="package-card border rounded p-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="fw-bold mb-0">Feature Ad</h5>
                            <span class="badge bg-primary rounded-pill">FEATURED</span>
                        </div>
                        <p class="text-muted small mb-3">Featured ads appear above the standard ads</p>
                        
                        <!-- Options list -->
                        <div class="feature-options">
                            <!-- 3 Days -->
                            <div class="border rounded p-3 mb-2 d-flex justify-content-between align-items-center bg-white featureContainer">
                                <div class="form-check">
                                    <input class="form-check-input package-option feature-radio" type="radio" name="feature_package" id="feature3" value="20" data-name="Feature Ad for 3 days">
                                    <label class="form-check-label fw-bold ms-2" for="feature3">
                                        Feature your ad for 3 days 
                                    </label>
                                </div>
                                <div>
                                    <span class="badge bg-danger me-2">LAUNCH OFFER: AED 10</span>
                                    <span class="fw-bold text-decoration-line-through text-muted small">AED 20</span>
                                </div>
                            </div>
                            <!-- 7 Days -->
                            <div class="border rounded p-3 mb-2 d-flex justify-content-between align-items-center bg-white featureContainer">
                                <div class="form-check">
                                    <input class="form-check-input package-option feature-radio" type="radio" name="feature_package" id="feature7" value="30" data-name="Feature Ad for 7 days">
                                    <label class="form-check-label fw-bold ms-2" for="feature7">
                                        Feature your ad for 7 days
                                    </label>
                                </div>
                                <div class="fw-bold">AED 30</div>
                            </div>
                            <!-- 14 Days -->
                            <div class="border rounded p-3 mb-2 d-flex justify-content-between align-items-center bg-white featureContainer">
                                <div class="form-check">
                                    <input class="form-check-input package-option feature-radio" type="radio" name="feature_package" id="feature14" value="50" data-name="Feature Ad for 14 days">
                                    <label class="form-check-label fw-bold ms-2" for="feature14">
                                        Feature your ad for 14 days
                                    </label>
                                </div>
                                <div class="fw-bold">AED 50</div>
                            </div>
                            <!-- 1 Month -->
                            <div class="border rounded p-3 mb-2 d-flex justify-content-between align-items-center bg-white featureContainer">
                                <div class="form-check">
                                    <input class="form-check-input package-option feature-radio" type="radio" name="feature_package" id="feature30" value="99" data-name="Feature Ad for 1 month">
                                    <label class="form-check-label fw-bold ms-2" for="feature30">
                                        Feature your ad for 1 month
                                    </label>
                                </div>
                                <div class="fw-bold">AED 99</div>
                            </div>
                            <!-- 2 Months -->
                            <div class="border rounded p-3 d-flex justify-content-between align-items-center bg-white featureContainer">
                                <div class="form-check">
                                    <input class="form-check-input package-option feature-radio" type="radio" name="feature_package" id="feature60" value="199" data-name="Feature Ad for 2 months">
                                    <label class="form-check-label fw-bold ms-2" for="feature60">
                                        Feature your ad for 2 months
                                    </label>
                                </div>
                                <div class="fw-bold">AED 199</div>
                            </div>
                        </div>
                        
                        <div class="mt-4 text-center">
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="clearFeatureBtn">Clear Feature Selection</button>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <small class="fw-bold text-muted">Prices are exclusive of VAT</small>
                        <p class="small text-muted mt-2">Paid ads that violate our posting rules will be deleted and will not be refunded. <a href="#">Read more</a></p>
                    </div>

                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-5">
                <div class="bg-white p-4 rounded shadow-sm border sticky-top" style="top: 100px;">
                    <h4 class="mb-4 text-center fw-bold">Order Summary</h4>
                    
                    <div class="d-flex justify-content-between mb-3 border-bottom pb-3">
                        <span class="text-muted">Basic Ad</span>
                        <span class="fw-bold">AED 0.00</span>
                    </div>
                    
                    <div id="order-items">
                        <!-- Dynamic items will appear here -->
                    </div>
                    
                    <div class="input-group mb-4 mt-3">
                        <input type="text" class="form-control" placeholder="Discount code">
                        <button class="btn btn-outline-secondary" type="button">Apply</button>
                    </div>
                    
                    <div class="border-top pt-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-bold">Subtotal</span>
                            <span class="fw-bold" id="summary-subtotal">AED 0.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 border-bottom pb-3">
                            <span class="text-muted">VAT 5%</span>
                            <span class="text-muted" id="summary-vat">AED 0.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="fw-bold mb-0">Total</h4>
                            <h4 class="fw-bold mb-0 text-danger" id="summary-total">AED 0.00</h4>
                        </div>
                        
                        <button class="btn btn-danger w-100 py-3 fw-bold fs-5" id="pay-button">Pay AED 0.00</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.footer')

<style>
    /* Custom Styling for the Package Selection */
    .package-selection-section {
        background-color: #f8f9fa;
        color: #333;
    }
    .package-card {
        background-color: #fcfcfc;
    }
    .form-check-input {
        width: 1.25em;
        height: 1.25em;
        cursor: pointer;
    }
    .form-check-label {
        cursor: pointer;
    }
    .feature-radio {
        accent-color: #0d6efd;
    }
    /* Highlight the selected option container */
    .selected-border {
        border-color: #dc3545 !important;
        background-color: #fff9fa !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const packageOptions = document.querySelectorAll('.package-option');
        const clearFeatureBtn = document.getElementById('clearFeatureBtn');
        const orderItemsContainer = document.getElementById('order-items');
        
        const elSubtotal = document.getElementById('summary-subtotal');
        const elVat = document.getElementById('summary-vat');
        const elTotal = document.getElementById('summary-total');
        const elPayButton = document.getElementById('pay-button');
        
        function calculateTotal() {
            let subtotal = 0;
            orderItemsContainer.innerHTML = '';
            
            // Handle Premium Style
            const premium7 = document.getElementById('premium7');
            const premiumContainer = document.getElementById('premiumContainer');
            if (premium7.checked) {
                premiumContainer.classList.add('border-danger');
            } else {
                premiumContainer.classList.remove('border-danger');
            }
            
            packageOptions.forEach(function(option) {
                // Handle Feature Radio styles
                if (option.classList.contains('feature-radio')) {
                    const container = option.closest('.featureContainer');
                    if (option.checked) {
                        container.classList.add('selected-border');
                    } else {
                        container.classList.remove('selected-border');
                    }
                }

                if (option.checked) {
                    let price = parseFloat(option.value);
                    if (option.id === 'feature3') {
                        price = 10; // Launch Offer 10 AED
                    }
                    
                    subtotal += price;
                    
                    const itemHtml = `
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">${option.getAttribute('data-name')}</span>
                        <span class="fw-bold">AED ${price.toFixed(2)}</span>
                    </div>`;
                    orderItemsContainer.insertAdjacentHTML('beforeend', itemHtml);
                }
            });
            
            const vat = subtotal * 0.05;
            const total = subtotal + vat;
            
            elSubtotal.textContent = `AED ${subtotal.toFixed(2)}`;
            elVat.textContent = `AED ${vat.toFixed(2)}`;
            elTotal.textContent = `AED ${total.toFixed(2)}`;
            elPayButton.textContent = `Pay AED ${total.toFixed(2)}`;
        }
        
        // Listen to changes
        packageOptions.forEach(function(option) {
            option.addEventListener('change', calculateTotal);
        });
        
        // Clear Feature Selection
        clearFeatureBtn.addEventListener('click', function() {
            document.querySelectorAll('.feature-radio').forEach(radio => radio.checked = false);
            calculateTotal();
        });
        
        // Initialize
        calculateTotal();
    });
</script>
@endsection
