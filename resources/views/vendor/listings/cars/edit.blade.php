@extends('vendor-layout.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container-xxl">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title mb-0">Edit Car Listing</h1>
                        </div>

                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('listings.cars.update', $listing->LS_Id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="LS_Title" class="form-control" value="{{ old('LS_Title', $listing->LS_Title) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Price (AED)</label>
                                    <input type="number" step="0.01" name="LS_Price" class="form-control" value="{{ old('LS_Price', $listing->LS_Price) }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="LS_City" class="form-control" value="{{ old('LS_City', $listing->LS_City) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" name="LS_Country" class="form-control" value="{{ old('LS_Country', $listing->LS_Country) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Brand</label>
                                        <input type="text" name="brand" class="form-control" value="{{ old('brand', $listing->LS_Attributes['brand'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Model</label>
                                        <input type="text" name="model" class="form-control" value="{{ old('model', $listing->LS_Attributes['model'] ?? '') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Year</label>
                                        <input type="number" name="year" class="form-control" value="{{ old('year', $listing->LS_Attributes['year'] ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mileage (km)</label>
                                        <input type="number" name="mileage" class="form-control" value="{{ old('mileage', $listing->LS_Attributes['mileage'] ?? '') }}">
                                    </div>
                                </div>

                                @php
                                    $attrs = $listing->LS_Attributes ?? [];
                                @endphp

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Fuel Type</label>
                                        <select name="fuel_type" class="form-control">
                                            @foreach (['petrol', 'diesel', 'electric', 'hybrid'] as $option)
                                                <option value="{{ $option }}" {{ old('fuel_type', $attrs['fuel_type'] ?? '') == $option ? 'selected' : '' }}>
                                                    {{ ucfirst($option) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Transmission</label>
                                        <select name="transmission" class="form-control">
                                            @foreach (['automatic', 'manual'] as $option)
                                                <option value="{{ $option }}" {{ old('transmission', $attrs['transmission'] ?? '') == $option ? 'selected' : '' }}>
                                                    {{ ucfirst($option) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Condition</label>
                                        <select name="condition" class="form-control">
                                            @foreach (['new', 'used'] as $option)
                                                <option value="{{ $option }}" {{ old('condition', $attrs['condition'] ?? '') == $option ? 'selected' : '' }}>
                                                    {{ ucfirst($option) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Listing</button>
                                <a href="{{ route('listings.cars.index') }}" class="btn btn-secondary">Cancel</a>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('vendor.footer')
    </div>
</div>
@endsection
