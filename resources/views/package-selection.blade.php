@extends('layouts.layout')

@section('content')

<!-- Simple Checkout Header -->
<header class="py-0 border-bottom bg-white text-center">
    <div class="container">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-decoration-none">
            <img src="/storage/images/logo.png" alt="Launch Logo" style="height: 100px; width: auto;">
        </a>
    </div>
</header>

<!-- Package Selection Section -->
<section class="package-selection-section py-5 bg-white">
    <div class="container">
        <form action="{{ route('payment.method') }}" method="POST">
            @csrf
            <input type="hidden" name="PR_Id" value="{{ $PR_Id ?? '' }}">
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
                        <div class="fw-bold text-dark">FREE</div>
                    </div>

                    <!-- Premium Package -->
                    <div class="package-card border rounded p-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="fw-bold mb-0">Premium Ad <span class="badge bg-dark text-white rounded-pill ms-2">NEW</span></h5>
                            <span class="badge bg-warning text-dark rounded-pill">PREMIUM</span>
                        </div>
                        <p class="text-muted small mb-3">Premium ads are placed on top of all ads</p>
                        
                        <!-- Premium active border style when checked -->
                        <div class="border rounded p-3 d-flex justify-content-between align-items-center" id="premiumContainer">
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
                            <span class="badge bg-dark text-white rounded-pill">FEATURED</span>
                        </div>
                        <p class="text-muted small mb-3">Featured ads appear above the standard ads</p>
                        
                        <!-- Options list -->
                        <div class="feature-options">
                            <!-- 3 Days -->
                            <div class="border rounded p-3 mb-2 d-flex justify-content-between align-items-center bg-white featureContainer">
                                <div class="form-check">
                                    <input class="form-check-input package-option feature-radio" type="radio" name="feature_package" id="feature3" value="10" data-name="Feature Ad for 3 days">
                                    <label class="form-check-label fw-bold ms-2" for="feature3">
                                        Feature your ad for 3 days 
                                    </label>
                                </div>
                                <div>
                                    <span class="badge bg-dark text-warning me-2">LAUNCH OFFER: AED 10</span>
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
                            <button type="button" class="btn btn-sm btn-outline-dark" id="clearFeatureBtn">Clear Feature Selection</button>
                        </div>
                    </div>
                    
                    <div class="mt-4 text-center">
                        <p class="fw-bold mb-1">Prices are exclusive of VAT</p>
                        <p class="text-muted small">Paid ads that violate our posting rules will be deleted and will not be refunded. <a href="#" class="text-warning text-decoration-none" data-bs-toggle="modal" data-bs-target="#postingRulesModal">Read more</a></p>
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
                    
                    <div class="discount-box mb-4 mt-3 shadow-sm">
                        <input type="text" class="form-control" placeholder="Enter discount code">
                        <button class="btn fw-bold" id="apply-btn" type="button">APPLY</button>
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
                            <h4 class="fw-bold mb-0 text-dark" id="summary-total">AED 0.00</h4>
                        </div>
                        
                        <button type="submit" class="btn w-100 py-2 fw-bold" id="pay-button">Continue to Payment</button>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>
</section>

<!-- Posting Rules Modal -->
<div class="modal fade" id="postingRulesModal" tabindex="-1" aria-labelledby="postingRulesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-0 shadow" style="background-color: #1a1a1a; color: #fff;">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold" id="postingRulesModalLabel">Posting Rules & Policy</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6 class="fw-bold mt-2 text-warning">1. Prohibited Content</h6>
        <p class="small mb-4" style="color: #ccc;">Ads containing illegal, offensive, spam, or inappropriate content are strictly prohibited and will be immediately removed.</p>
        
        <h6 class="fw-bold text-warning">2. Accuracy of Information</h6>
        <p class="small mb-4" style="color: #ccc;">All details provided in the ad must be accurate, truthful, and representative of the actual product or service. Misleading ads will be taken down.</p>
        
        <h6 class="fw-bold text-warning">3. Duplicate Listings</h6>
        <p class="small mb-4" style="color: #ccc;">Posting the exact same ad multiple times is not allowed and clutters the platform. Please use our feature options to bump your ad instead.</p>
        
        <h6 class="fw-bold text-warning">4. Strict Refund Policy</h6>
        <p class="small mb-2" style="color: #ccc;">Payments made for premium or featured ads are final. If your ad is removed by moderators due to a violation of any of our posting terms, <strong class="text-white">no refund will be issued</strong> under any circumstances.</p>
      </div>
      <div class="modal-footer border-top-0 pt-0">
        <button type="button" class="btn w-100 fw-bold" id="understand-btn" data-bs-dismiss="modal">I UNDERSTAND</button>
      </div>
    </div>
  </div>
</div>

<!-- Simple Checkout Footer -->
<footer class="py-4 bg-light text-center border-top mt-auto">
    <div class="container">
        <p class="text-muted small mb-0">&copy; {{ date('Y') }} Launch. All rights reserved.</p>
    </div>
</footer>

<style>
    /* Launch Dark Theme Overrides */
    body, .package-selection-section {
        background-color: #000000 !important;
        color: #ffffff !important;
    }
    header.bg-white, footer.bg-light {
        background-color: #000000 !important;
    }
    header.border-bottom, footer.border-top {
        border-color: #333333 !important;
    }
    .text-dark {
        color: #ffffff !important;
    }
    .text-muted {
        color: #aaaaaa !important;
    }
    .border {
        border-color: #333333 !important;
    }
    
    /* Cards and Containers */
    .bg-white.p-4.rounded.shadow-sm, .package-card {
        background-color: #111111 !important;
        border: 1px solid #333333 !important;
    }
    
    .featureContainer, #premiumContainer {
        background-color: transparent !important;
    }
    
    /* Highlight the selected option container */
    .selected-border {
        border-color: #ffc107 !important;
        background-color: #1a1a1a !important;
    }
    
    .feature-radio {
        cursor: pointer;
        accent-color: #ffc107; /* Gold accent for radio */
    }
    
    /* Buttons */
    .btn-outline-dark {
        color: #ffc107;
        border-color: #ffc107;
    }
    .btn-outline-dark:hover {
        background-color: #ffc107;
        color: #000;
    }
    
    /* Pay & Understand Button Custom Styling */
    #pay-button, #understand-btn, #apply-btn {
        background-color: #ffc107 !important;
        border-color: #ffc107 !important;
        color: #000000 !important;
        transition: all 0.3s ease;
    }
    #pay-button:hover, #understand-btn:hover, #apply-btn:hover {
        background-color: #e0a800 !important;
        border-color: #e0a800 !important;
        color: #000000 !important;
    }
    /* Discount Box Custom Styling */
    .discount-box {
        display: flex;
        background: #000;
        border: 2px solid #333333;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .discount-box:focus-within {
        border-color: #000;
        box-shadow: 0 0 0 3px rgba(0,0,0,0.1);
    }
    .discount-box input {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
        color: #000 !important;
        padding: 12px 16px;
        border-radius: 0 !important;
    }
    .discount-box button {
        border-radius: 0 !important;
        padding: 12px 24px;
        margin: 0;
        border: none;
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
                premiumContainer.classList.add('border-dark');
            } else {
                premiumContainer.classList.remove('border-dark');
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
