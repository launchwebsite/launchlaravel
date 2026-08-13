@extends('layouts.admin-layout')

@section('content')
    @include('includes.admin-header')
    @include('includes.admin-sidebar')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title mb-0">Vendor Products</h1>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle mb-0">
                                        <thead class="color-head">
                                            <tr>
                                                <th>#</th>
                                                <th>Vendor Name</th>
                                                <th>Category</th>
                                                {{-- <th>Product Name</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($products as $key => $product)
                                                <tr>
                                                    <td>{{ $products->firstItem() + $key }}</td>
                                                    <td>{{ $product->vendor->VR_Name ?? '—' }}</td>
                                                    <td>{{ $product->category->CT_Name ?? '—' }}</td>
                                                    {{-- <td>{{ $product->PR_Details['Product Name'] ?? '—' }}</td> --}}
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#productModal{{ $product->PR_Id }}">
                                                            View
                                                        </button>
                                                        <form action="{{ route('admin.product.edit') }}" method="POST"
                                                            style="display:inline;">
                                                            @csrf

                                                            <input type="hidden" name="PR_Id"
                                                                value="{{ $product->PR_Id }}">

                                                            <button type="submit" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('admin.product.delete', $product->PR_Id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Delete this product?');"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                @php
                                                    $imageOrder = [
                                                        'Main Image',
                                                        'Image 1',
                                                        'image 1',
                                                        'Image 2',
                                                        'Image 3',
                                                    ];
                                                    $details = $product->PR_Details ?? [];

                                                    $orderedDetails = [];
                                                    foreach ($imageOrder as $imgKey) {
                                                        if (array_key_exists($imgKey, $details)) {
                                                            $orderedDetails[$imgKey] = $details[$imgKey];
                                                            unset($details[$imgKey]);
                                                        }
                                                    }
                                                    $orderedDetails = $orderedDetails + $details;
                                                @endphp

                                                <div class="modal fade" id="productModal{{ $product->PR_Id }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content" style="border-radius:12px;">
                                                            <div class="modal-header"
                                                                style="border-bottom:0.5px solid #333; padding:1.25rem 1.5rem;">
                                                                <div>
                                                                    <p class="mb-1" style="font-size:12px;color:#888;">
                                                                        Product</p>
                                                                    <h4 class="modal-title mb-0">
                                                                        {{ $product->PR_Details['Product Name'] ?? 'Product Details' }}
                                                                    </h4>
                                                                </div>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" style="padding:1.5rem;">

                                                                <div class="d-flex align-items-center gap-3"
                                                                    style="margin-bottom: 3.8rem">
                                                                    <div
                                                                        style="width:48px;height:48px;border-radius:50%;background:#e6f1fb;display:flex;align-items:center;justify-content:center;font-weight:500;font-size:16px;color:#0c447c;flex-shrink:0;">
                                                                        {{ strtoupper(substr($product->vendor->VR_Name ?? '?', 0, 2)) }}
                                                                    </div>
                                                                    <div>
                                                                        <p class="mb-0"
                                                                            style="font-size:13px;color:#888;">Vendor</p>
                                                                        <p class="mb-0"
                                                                            style="font-size:16px;font-weight:500;">
                                                                            {{ $product->vendor->VR_Name ?? '—' }}</p>
                                                                    </div>
                                                                    <div class="ms-auto text-end">
                                                                        <p class="mb-0"
                                                                            style="font-size:13px;color:#888;">Category</p>
                                                                        <p class="mb-0" style="font-size:14px;">
                                                                            {{ $product->category->CT_Name ?? '—' }}</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row g-4"
                                                                    style="border-top:0.5px solid #333;padding-top:1.5rem;">
                                                                    @foreach ($orderedDetails as $label => $value)
                                                                        <div class="col-md-4 col-6">
                                                                            <p class="mb-1"
                                                                                style="font-size:12px;color:#888;text-transform:uppercase;letter-spacing:0.03em;">
                                                                                {{ $label }}</p>
                                                                            @php
                                                                                $displayValue = is_array($value)
                                                                                    ? implode(', ', $value)
                                                                                    : $value;
                                                                            @endphp
                                                                            @if (str_contains(strtolower($label), 'image'))
                                                                                @if (!empty($displayValue))
                                                                                    <img src="{{ asset('storage/uploads/products/' . $displayValue) }}"
                                                                                        style="max-width:100%;border-radius:8px;">
                                                                                @else
                                                                                    <p class="mb-0"
                                                                                        style="font-size:14px;color:#666;">
                                                                                        No image</p>
                                                                                @endif
                                                                            @elseif (strtolower($label) === 'color' && is_string($value) && preg_match('/^#[0-9a-f]{6}$/i', $value))
                                                                                <div
                                                                                    class="d-flex align-items-center gap-2">
                                                                                    <span
                                                                                        style="width:14px;height:14px;border-radius:50%;background:{{ $value }};border:0.5px solid #555;display:inline-block;"></span>
                                                                                    <span
                                                                                        style="font-size:15px;">{{ $value }}</span>
                                                                                </div>
                                                                            @elseif (strtolower($label) === 'condition')
                                                                                <span class="badge"
                                                                                    style="background:#fac775;color:#412402;font-weight:400;font-size:13px;padding:4px 10px;">{{ $displayValue }}</span>
                                                                            @elseif (strtolower($label) === 'description')
                                                                                <p class="mb-0"
                                                                                    style="font-size:15px;color:#ccc;">
                                                                                    {{ $displayValue }}</p>
                                                                            @else
                                                                                <p class="mb-0" style="font-size:15px;">
                                                                                    {{ $displayValue }}</p>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer"
                                                                style="border-top:0.5px solid #333; padding:1.25rem 1.5rem;">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-4">No products found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    {{ $products->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('includes.admin-footer')
        </div>
    </div>
@endsection
