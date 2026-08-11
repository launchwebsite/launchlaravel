@extends('vendor-layout.app')
@section('content')
    <style>
        /* ========================================= PRODUCTS TABLE ========================================= */
        .products-wrapper {
            ba ckground: #ffffff;
            border: 1px solid #edf0f4;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(20, 30, 50, 0.05);
        }

        .product-detail-image {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    padding: 4px;
    background: #fff;
    cursor: pointer;
    transition: 0.3s ease;
}

.product-detail-image:hover {
    transform: scale(1.05);
}

        /* Header */
        .products-header {
            padding: 24px 26px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #020b18;
        }

        .products-title {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            color: #171a1f;
        }

        .products-subtitle {
            margin: 5px 0 0;
            color: #8a929d;
            font-size: 13px;
        }

        .products-count {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 9px 15px;
            background: #101113;
            color: #4d6bfe;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
        }

        /* Table */
        .products-table {
            width: 100%;
            border-collapse: collapse;
        }

        .products-table thead {
            background: #000000;
        }

        .products-table th {
            padding: 15px 18px;
            color: #8a929d;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            border-bottom: 1px solid #01050a;
            white-space: nowrap;
        }

        .products-table td {
            padding: 17px 18px;
            border-bottom: 1px solid #000000;
            vertical-align: middle;
        }

        .products-table tbody tr {
            transition: .2s ease;
        }

        .products-table tbody tr:hover {
            background: #010101;
        }

        .products-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Number */
        .row-number {
            color: #d3d7dc;
            font-size: 13px;
            font-weight: 600;
        }

        /* Product */
        .product-name-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 220px;
        }

        .product-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: linear-gradient(135deg, #eef2ff, #f7f8ff);
            color: #536dfe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .product-name {
            color: #20242a;
            font-size: 14px;
            font-weight: 650;
        }

        .product-small-id {
            margin-top: 3px;
            color: #a0a7b0;
            font-size: 11px;
        }

        /* Category */
        .category-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            background: #131313;
            border-radius: 7px;
            color: #505963;
            font-size: 12px;
            font-weight: 600;
        }s

        .category-badge i {
            color: #6875f5;
        }

        /* Subcategory */
        .subcategory-text {
            color: #555e68;
            font-size: 13px;
            font-weight: 500;
        }

        /* Product ID */
        .product-id {
            color: #555e68;
            font-size: 13px;
            font-weight: 600;
        }

        /* Status */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            background: #eaf8f0;
            color: #198754;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            background: #20a464;
            border-radius: 50%;
        }

        /* View Button */
        .action-cell {
            text-align: center;
        }

        .view-product-btn {
            width: 38px;
            height: 38px;
            border: 1px solid #e2e6ec;
            background: #ffffff;
            color: #5668f5;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all .2s ease;
            font-size: 16px;
        }

        .view-product-btn:hover {
            background: #5668f5;
            border-color: #5668f5;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(86, 104, 245, .22);
        }

        /* ========================================= PRODUCT MODAL ========================================= */
        .product-modal {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(20, 25, 40, .20);
        }

        /* Modal Header */
        .product-modal-header {
            padding: 25px 28px;
            background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
            border-bottom: 1px solid #edf0f4;
        }

        .modal-product-heading {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .modal-product-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            background: linear-gradient(135deg, #596df6, #7485ff);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            box-shadow: 0 8px 20px rgba(89, 109, 246, .25);
        }

        .modal-product-label {
            color: #8b93a0;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.2px;
            margin-bottom: 3px;
        }

        .modal-product-name {
            margin: 0;
            color: #1d2128;
            font-size: 20px;
            font-weight: 700;
        }

        .modal-product-id {
            margin-top: 3px;
            color: #9299a3;
            font-size: 12px;
        }

        /* Modal Body */
        .product-modal-body {
            padding: 28px;
            background: #ffffff;
        }

        /* Section */
        .details-section {
            border: 1px solid #edf0f4;
            border-radius: 13px;
            overflow: hidden;
        }

        .details-section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 17px 19px;
            background: #fafbfc;
            border-bottom: 1px solid #edf0f4;
        }

        .section-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: #eef1ff;
            color: #596df6;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .details-section-title h6 {
            margin: 0;
            color: #272c33;
            font-size: 13px;
            font-weight: 700;
        }

        .details-section-title span {
            display: block;
            margin-top: 2px;
            color: #999fa8;
            font-size: 11px;
        }

        /* Details Grid */
        .details-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .detail-box {
            padding: 18px 20px;
            border-right: 1px solid #edf0f4;
            border-bottom: 1px solid #edf0f4;
        }

        .detail-box:nth-child(3n) {
            border-right: none;
        }

        .detail-box:nth-last-child(-n+3) {
            border-bottom: none;
        }

        .detail-label {
            margin-bottom: 7px;
            color: #9aa1aa;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .detail-value {
            color: #292e35;
            font-size: 14px;
            font-weight: 600;
        }

        /* Product Details */
        .product-details-container {
            padding: 5px;
        }

        .details-list {
            width: 100%;
        }

        .detail-row {
            display: flex;
            align-items: center;
            min-height: 52px;
            border-bottom: 1px solid #f0f2f5;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-row-label {
            width: 35%;
            padding: 14px 18px;
            color: #858d97;
            font-size: 12px;
            font-weight: 650;
            text-transform: capitalize;
        }

        .detail-row-value {
            width: 65%;
            padding: 14px 18px;
            color: #272c33;
            font-size: 13px;
            font-weight: 550;
        }

        .raw-details {
            padding: 20px;
            color: #555e68;
            font-size: 13px;
            line-height: 1.7;
            white-space: pre-wrap;
        }

        /* Modal Footer */
        .product-modal-footer {
            padding: 17px 28px;
            border-top: 1px solid #edf0f4;
            background: #fafbfc;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-footer-left {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #8e96a0;
            font-size: 11px;
        }

        .modal-footer-left i {
            color: #22a06b;
        }

        .modal-close-btn {
            border: 1px solid #e1e5eb;
            background: #ffffff;
            color: #555e68;
            padding: 9px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
        }

        .modal-close-btn:hover {
            background: #f1f3f6;
        }

        /* ========================================= EMPTY STATE ========================================= */
        .empty-products {
            text-align: center;
            padding: 70px 20px;
            background: #ffffff;
            border: 1px solid #edf0f4;
            border-radius: 16px;
        }

        .empty-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 18px;
            border-radius: 18px;
            background: #f3f5f8;
            color: #9aa2ad;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .empty-products h4 {
            margin-bottom: 7px;
            color: #292e35;
            font-weight: 700;
        }

        .empty-products p {
            color: #9299a3;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .empty-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 18px;
            background: #5668f5;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        /* ========================================= RESPONSIVE ========================================= */
        @media (max-width: 991px) {
            .details-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .detail-box:nth-child(3n) {
                border-right: 1px solid #edf0f4;
            }

            .detail-box:nth-child(2n) {
                border-right: none;
            }

            .detail-box:nth-last-child(-n+3) {
                border-bottom: 1px solid #edf0f4;
            }

            .detail-box:nth-last-child(-n+2) {
                border-bottom: none;
            }
        }

        @media (max-width: 767px) {
            .products-header {
                padding: 18px;
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            .products-table {
                min-width: 900px;
            }

            .product-modal-body {
                padding: 18px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .detail-box,
            .detail-box:nth-child(2n),
            .detail-box:nth-child(3n) {
                border-right: none;
                border-bottom: 1px solid #edf0f4;
            }

            .detail-box:last-child {
                border-bottom: none;
            }

            .detail-row {
                display: block;
            }

            .detail-row-label,
            .detail-row-value {
                width: 100%;
                display: block;
                padding: 7px 15px;
            }

            .detail-row-label {
                padding-top: 14px;
                padding-bottom: 2px;
            }

            .detail-row-value {
                padding-top: 2px;
                padding-bottom: 14px;
            }

            .product-modal-header {
                padding: 18px;
            }

            .modal-product-name {
                font-size: 17px;
            }

            .product-modal-footer {
                padding: 14px 18px;
            }
        }
    </style>
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container">

                <h3>My Posts</h3>

@if($products->count() > 0)

    <div class="products-wrapper">

        {{-- Header --}}
        <div class="products-header">
            <div>
                <h4 class="products-title text-white">
                    My Products
                </h4>

                <p class="products-subtitle">
                    Manage and view all your posted products
                </p>
            </div>

            <div class="products-count">
                <i class="bi bi-box-seam"></i>
                {{ $products->count() }} Products
            </div>
        </div>


        {{-- Table --}}
        <div class="table-responsive">

            <table class="products-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Product ID</th>

                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($products as $product)

                        <tr>

                            {{-- Number --}}
                            <td>
                                <span class="row-number">
                                    {{ $loop->iteration }}
                                </span>
                            </td>


                            {{-- Product Name --}}
                            <td>

                                <div class="product-name-wrapper">

                                    <div class="product-icon">
                                        <i class="bi bi-box-seam"></i>
                                    </div>

                                    <div>
                                        <div class="product-name">
                                            {{ $product->PR_Name }}
                                        </div>

                                        <div class="product-small-id">
                                            Product #{{ $product->PR_Id }}
                                        </div>
                                    </div>

                                </div>

                            </td>


                            {{-- Category --}}
                            <td>

                                <span class="category-badge">
                                    <i class="bi bi-grid"></i>
                                    {{ $product->category->CT_Name }}
                                </span>

                            </td>


                            {{-- Sub Category --}}
                            <td>

                                <span class="subcategory-text">
                                    {{ $product->subcategory->SC_Name }}
                                </span>

                            </td>


                            {{-- Product ID --}}
                            <td>

                                <span class="product-id">
                                    #{{ $product->PR_Id }}
                                </span>

                            </td>





                            {{-- View --}}
                            <td class="action-cell">

                                <button
                                    type="button"
                                    class="view-product-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#productModal{{ $product->PR_Id }}"
                                    title="View Product">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </td>

                        </tr>


                        {{-- =========================
                             PRODUCT DETAILS MODAL
                        ========================== --}}

                        <div class="modal fade"
                             id="productModal{{ $product->PR_Id }}"
                             tabindex="-1"
                             aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered modal-xl">

                                <div class="modal-content product-modal">


                                    {{-- Modal Header --}}
                                    <div class="modal-header product-modal-header">

                                        <div class="modal-product-heading">

                                            <div class="modal-product-icon">
                                                <i class="bi bi-box-seam"></i>
                                            </div>

                                            <div>

                                                <div class="modal-product-label">
                                                    PRODUCT DETAILS
                                                </div>

                                                <h4 class="modal-product-name">
                                                    {{ $product->PR_Name }}
                                                </h4>

                                                <div class="modal-product-id">
                                                    Product ID #{{ $product->PR_Id }}
                                                </div>

                                            </div>

                                        </div>


                                        <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close">
                                        </button>

                                    </div>


                                    {{-- Modal Body --}}
                                    <div class="modal-body product-modal-body">

                                        {{-- Basic Information --}}
                                        <div class="details-section">

                                            <div class="details-section-title">

                                                <div class="section-icon">
                                                    <i class="bi bi-info-circle"></i>
                                                </div>

                                                <div>
                                                    <h6>Basic Information</h6>
                                                    <span>General information about this product</span>
                                                </div>

                                            </div>


                                            <div class="details-grid">


                                                {{-- Product Name --}}



                                                {{-- Product ID --}}



                                                {{-- Vendor --}}
                                                <div class="detail-box">

                                                    <div class="detail-label">
                                                        Vendor Name
                                                    </div>

                                                    <div class="detail-value">
                                                        {{ $product->vendor->VR_Name }}
                                                    </div>

                                                </div>


                                                {{-- Category --}}
                                                <div class="detail-box">

                                                    <div class="detail-label">
                                                        Category
                                                    </div>

                                                    <div class="detail-value">
                                                        {{ $product->category->CT_Name }}
                                                    </div>

                                                </div>


                                                {{-- Sub Category --}}
                                                <div class="detail-box">

                                                    <div class="detail-label">
                                                        Sub Category
                                                    </div>

                                                    <div class="detail-value">
                                                        {{ $product->subcategory->SC_Name }}
                                                    </div>

                                                </div>





                                            </div>

                                        </div>


                                        {{-- Product Attributes / Details --}}
                                        <div class="details-section mt-4">

                                            <div class="details-section-title">

                                                <div class="section-icon">
                                                    <i class="bi bi-list-ul"></i>
                                                </div>

                                                <div>
                                                    <h6>Product Information</h6>
                                                    <span>
                                                        Complete information submitted for this product
                                                    </span>
                                                </div>

                                            </div>


                                            <div class="product-details-container">

                                                @php
                                                    $details = $product->PR_Details;

                                                    if (is_string($details)) {
                                                        $decodedDetails = json_decode($details, true);
                                                    } else {
                                                        $decodedDetails = $details;
                                                    }
                                                @endphp


                                                @if(is_array($decodedDetails))

                                                    <div class="details-list">

 @foreach($decodedDetails as $key => $value)

            <div class="detail-row">

                <div class="detail-row-label">
                    {{ ucwords(str_replace(['_', '-'], ' ', $key)) }}
                </div>

                <div class="detail-row-value">

                    @if(is_array($value))

                        {{ implode(', ', $value) }}

                    @elseif(
                        is_string($value) &&
                        preg_match('/\.(jpg|jpeg|png|gif|webp|svg)$/i', $value)
                    )

                        <img src="{{ asset('storage/' . $value) }}"
                             alt="{{ $key }}"
                             class="product-detail-image">

                    @else

                        {{ $value }}

                    @endif

                </div>

            </div>

        @endforeach

                                                    </div>

                                                @else



                                                    <div class="raw-details">
                                                        {{ $product->PR_Details }}
                                                    </div>

                                                @endif

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Modal Footer --}}
                                    <div class="modal-footer product-modal-footer">

                                        <div class="modal-footer-left">

                                            <i class="bi bi-shield-check"></i>

                                            <span>
                                                Product information
                                            </span>

                                        </div>


                                        <button type="button"
                                                class="modal-close-btn"
                                                data-bs-dismiss="modal">

                                            <i class="bi bi-x-lg"></i>
                                            Close

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

@else

    {{-- Empty State --}}

    <div class="empty-products">

        <div class="empty-icon">
            <i class="bi bi-box-seam"></i>
        </div>

        <h4>No Products Yet</h4>

        <p>
            You haven't posted any products yet.
        </p>

        <a href="#" class="empty-btn">
            <i class="bi bi-plus-lg"></i>
            Add Product
        </a>

    </div>

@endif




            </div>



            @include('vendor.footer')

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
@endsection
