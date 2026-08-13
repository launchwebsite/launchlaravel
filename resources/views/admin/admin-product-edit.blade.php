@extends('layouts.admin-layout')

@section('content')
    @include('includes.admin-header')
    @include('includes.admin-sidebar')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-xxl">

                <div class="row justify-content-center">
                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">
                                <h1 class="card-title mb-0">Edit Product</h1>
                            </div>

                            <div class="card-body">

                                {{-- Validation Errors --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('admin.product.update', $product->PR_Id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')

                                    {{-- ================= CATEGORY ================= --}}
                                    <div class="mb-3 row">

                                        <label class="col-sm-2 col-form-label">
                                            Category
                                        </label>

                                        <div class="col-sm-10">

                                            <select name="CT_Id" id="category" class="form-control">

                                                <option value="">
                                                    Select Category
                                                </option>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->CT_Id }}"
                                                        {{ old('CT_Id', $product->CT_Id) == $category->CT_Id ? 'selected' : '' }}>

                                                        {{ $category->CT_Name }}

                                                    </option>
                                                @endforeach

                                            </select>

                                            @error('CT_Id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                        </div>

                                    </div>


                                    {{-- ================= SUB CATEGORY ================= --}}
                                    <div class="mb-3 row">

                                        <label class="col-sm-2 col-form-label">
                                            Sub Category
                                        </label>

                                        <div class="col-sm-10">

                                            <select name="SC_Id" id="subcategory" class="form-control">

                                                <option value="">
                                                    Select Sub Category
                                                </option>

                                                @foreach ($sub_categories as $subcategory)
                                                    <option value="{{ $subcategory->SC_Id }}"
                                                        data-category="{{ $subcategory->CT_Id }}"
                                                        {{ old('SC_Id', $product->SC_Id) == $subcategory->SC_Id ? 'selected' : '' }}
                                                        {{ $subcategory->CT_Id != old('CT_Id', $product->CT_Id) ? 'hidden' : '' }}>

                                                        {{ $subcategory->SC_Name }}

                                                    </option>
                                                @endforeach

                                            </select>

                                            @error('SC_Id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                        </div>

                                    </div>


                                    {{-- ================= EXISTING DETAILS ================= --}}
                                    @php

                                        $existingDetails = $product->PR_Details ?? [];

                                        /*
                                         * If PR_Details is stored as JSON and the model
                                         * doesn't cast it automatically, decode it.
                                         */
                                        if (is_string($existingDetails)) {
                                            $existingDetails = json_decode($existingDetails, true) ?? [];
                                        }

                                    @endphp


                                    {{-- ================= ALL ATTRIBUTES ================= --}}
                                    @foreach ($attributes as $attribute)
                                        @php

                                            $existingValue = $existingDetails[$attribute->AT_Inputs] ?? '';

                                            $hasValue =
                                                $attribute->SC_Id == $product->SC_Id &&
                                                $existingValue !== null &&
                                                $existingValue !== '' &&
                                                $existingValue !== [];

                                        @endphp

                                        @if ($hasValue)
                                            <div class="mb-3 row attribute-row">

                                                {{-- Attribute Label --}}
                                                <label class="col-sm-2 col-form-label">

                                                    {{ $attribute->AT_Inputs }}

                                                </label>


                                                {{-- Attribute Input --}}
                                                <div class="col-sm-10">


                                                    @switch($attribute->AT_Structure)
                                                        {{-- ================= TEXT ================= --}}
                                                        @case('string')
                                                        @case('text')
                                                            <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                value="{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) }}">
                                                        @break

                                                        {{-- ================= TEXTAREA ================= --}}
                                                        @case('textarea')
                                                            <textarea name="AT_Inputs[{{ $attribute->AT_Id }}]" id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                rows="4" placeholder="Enter {{ $attribute->AT_Inputs }}">{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) }}</textarea>
                                                        @break

                                                        {{-- ================= NUMBER ================= --}}
                                                        @case('number')
                                                            <input type="number" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                value="{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) }}">
                                                        @break

                                                        {{-- ================= EMAIL ================= --}}
                                                        @case('email')
                                                            <input type="email" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                value="{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) }}">
                                                        @break

                                                        {{-- ================= PASSWORD ================= --}}
                                                        @case('password')
                                                            <input type="password" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                placeholder="Enter {{ $attribute->AT_Inputs }}">
                                                        @break

                                                        {{-- ================= TEL ================= --}}
                                                        @case('tel')
                                                            <input type="tel" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                value="{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) }}">
                                                        @break

                                                        {{-- ================= URL ================= --}}
                                                        @case('url')
                                                            <input type="url" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                value="{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) }}">
                                                        @break

                                                        {{-- ================= DATE ================= --}}
                                                        @case('date')
                                                            <input type="date" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                value="{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) }}">
                                                        @break

                                                        {{-- ================= DATETIME ================= --}}
                                                        @case('datetime')
                                                            <input type="datetime-local" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                value="{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) }}">
                                                        @break

                                                        {{-- ================= TIME ================= --}}
                                                        @case('time')
                                                            <input type="time" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                value="{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) }}">
                                                        @break

                                                        {{-- ================= SELECT ================= --}}
                                                        @case('select')
                                                            <select name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control">

                                                                <option value="">
                                                                    Select {{ $attribute->AT_Inputs }}
                                                                </option>

                                                                @foreach (explode(',', $attribute->AT_Options) as $option)
                                                                    @php
                                                                        $option = trim($option);
                                                                    @endphp

                                                                    <option value="{{ $option }}"
                                                                        {{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) == $option ? 'selected' : '' }}>

                                                                        {{ $option }}

                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        @break

                                                        {{-- ================= RADIO ================= --}}
                                                        @case('radio')
                                                            @foreach (explode(',', $attribute->AT_Options) as $option)
                                                                @php
                                                                    $option = trim($option);
                                                                @endphp

                                                                <div class="form-check form-check-inline">

                                                                    <input type="radio" class="form-check-input"
                                                                        name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                        id="AT_Inputs_{{ $attribute->AT_Id }}_{{ $loop->index }}"
                                                                        value="{{ $option }}"
                                                                        {{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) == $option ? 'checked' : '' }}>

                                                                    <label class="form-check-label"
                                                                        for="AT_Inputs_{{ $attribute->AT_Id }}_{{ $loop->index }}">

                                                                        {{ $option }}

                                                                    </label>

                                                                </div>
                                                            @endforeach
                                                        @break

                                                        {{-- ================= CHECKBOX ================= --}}
                                                        @case('checkbox')
                                                            @php

                                                                $checkedValues = old(
                                                                    'AT_Inputs.' . $attribute->AT_Id,
                                                                    $existingValue ?? [],
                                                                );

                                                                if (!is_array($checkedValues)) {
                                                                    $checkedValues = explode(',', $checkedValues);
                                                                }

                                                            @endphp


                                                            @foreach (explode(',', $attribute->AT_Options) as $option)
                                                                @php
                                                                    $option = trim($option);
                                                                @endphp

                                                                <div class="form-check">

                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="AT_Inputs[{{ $attribute->AT_Id }}][]"
                                                                        id="AT_Inputs_{{ $attribute->AT_Id }}_{{ $loop->index }}"
                                                                        value="{{ $option }}"
                                                                        {{ in_array($option, $checkedValues) ? 'checked' : '' }}>

                                                                    <label class="form-check-label"
                                                                        for="AT_Inputs_{{ $attribute->AT_Id }}_{{ $loop->index }}">

                                                                        {{ $option }}

                                                                    </label>

                                                                </div>
                                                            @endforeach
                                                        @break

                                                        {{-- ================= COLOR ================= --}}
                                                        @case('color')
                                                            <input type="color" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                class="form-control form-control-color"
                                                                value="{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue ?: '#000000') }}"
                                                                title="Choose {{ $attribute->AT_Inputs }}">
                                                        @break

                                                        {{-- ================= FILE ================= --}}
                                                        @case('file')
                                                            @if ($existingValue)
                                                                <div class="mb-2">

                                                                    <img src="{{ asset('storage/uploads/products/' . $existingValue) }}"
                                                                        style="max-width:120px; border-radius:8px;">

                                                                </div>
                                                            @endif


                                                            <input type="file" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control">
                                                        @break

                                                        {{-- ================= DEFAULT ================= --}}

                                                        @default
                                                            <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                                placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                value="{{ old('AT_Inputs.' . $attribute->AT_Id, $existingValue) }}">
                                                    @endswitch


                                                </div>

                                            </div>
                                        @endif
                                    @endforeach


                                    {{-- ================= BUTTONS ================= --}}
                                    <div class="text-end mt-4">

                                        <button type="submit" class="btn btn-primary">

                                            Update Product

                                        </button>

                                        <a href="{{ route('admin.product.list') }}" class="btn btn-secondary">

                                            Cancel

                                        </a>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

            @include('includes.admin-footer')

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const category = document.getElementById('category');
            const subcategory = document.getElementById('subcategory');

            function filterSubcategories() {
                const selectedCategory = category.value;

                Array.from(subcategory.options).forEach(function (option) {
                    if (!option.value) {
                        option.hidden = false;
                        return;
                    }
                    option.hidden = option.dataset.category !== selectedCategory;
                });
            }

            category.addEventListener('change', function () {
                subcategory.value = '';
                filterSubcategories();
            });

            filterSubcategories();
        });
    </script>
@endsection
