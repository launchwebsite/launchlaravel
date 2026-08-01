@extends('vendor-layout.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container-xxl">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title mb-0">List a Car</h1>
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

                            <form action="{{ route('listings.cars.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="LS_Title" class="form-control" value="{{ old('LS_Title') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Price (AED)</label>
                                    <input type="number" step="0.01" name="LS_Price" class="form-control" value="{{ old('LS_Price') }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="LS_City" class="form-control" value="{{ old('LS_City') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" name="LS_Country" class="form-control" value="{{ old('LS_Country') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Brand</label>
                                        <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Model</label>
                                        <input type="text" name="model" class="form-control" value="{{ old('model') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Year</label>
                                        <input type="number" name="year" class="form-control" value="{{ old('year') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mileage (km)</label>
                                        <input type="number" name="mileage" class="form-control" value="{{ old('mileage') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Fuel Type</label>
                                        <select name="fuel_type" class="form-control">
                                            <option value="petrol" {{ old('fuel_type') == 'petrol' ? 'selected' : '' }}>Petrol</option>
                                            <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                            <option value="electric" {{ old('fuel_type') == 'electric' ? 'selected' : '' }}>Electric</option>
                                            <option value="hybrid" {{ old('fuel_type') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Transmission</label>
                                        <select name="transmission" class="form-control">
                                            <option value="automatic" {{ old('transmission') == 'automatic' ? 'selected' : '' }}>Automatic</option>
                                            <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }}>Manual</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Condition</label>
                                        <select name="condition" class="form-control">
                                            <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                                            <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }}>Used</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">List Car</button>
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
