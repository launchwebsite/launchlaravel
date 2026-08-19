@extends('layouts.admin-layout')

@section('content')

    @include('includes.admin-header')
    @include('includes.admin-sidebar')

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-xxl">

                <div class="row justify-content-center product-kiki">
                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Products</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-0">

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

                                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

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
                                                    <option value="{{ \Vinkla\Hashids\Facades\Hashids::encode($category->CT_Id) }}"
                                                        {{ old('CT_Id') == \Vinkla\Hashids\Facades\Hashids::encode($category->CT_Id) ? 'selected' : '' }}>

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
                                                    <option value="{{ \Vinkla\Hashids\Facades\Hashids::encode($subcategory->SC_Id) }}"
                                                        data-category="{{ \Vinkla\Hashids\Facades\Hashids::encode($subcategory->CT_Id) }}"
                                                        {{ old('SC_Id') == \Vinkla\Hashids\Facades\Hashids::encode($subcategory->SC_Id) ? 'selected' : '' }}
                                                        {{ \Vinkla\Hashids\Facades\Hashids::encode($subcategory->CT_Id) != old('CT_Id') ? 'hidden' : '' }}>

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


                                    {{-- ================= ATTRIBUTES ================= --}}
                                    @foreach ($attributes as $attribute)
                                        <div class="mb-3 row attribute-row" data-subcategory="{{ \Vinkla\Hashids\Facades\Hashids::encode($attribute->SC_Id) }}"
                                            style="{{ old('SC_Id') == \Vinkla\Hashids\Facades\Hashids::encode($attribute->SC_Id) ? '' : 'display: none;' }}">

                                            <label class="col-sm-2 col-form-label">

                                                {{ $attribute->AT_Inputs }}

                                            </label>


                                            <div class="col-sm-10">


                                                @switch($attribute->AT_Structure)
                                                    {{-- ================= TEXT ================= --}}
                                                    @case('string')
                                                    @case('text')
                                                        <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                            id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                            placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                            value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}">
                                                    @break

                                                    {{-- ================= TEXTAREA ================= --}}
                                                    @case('textarea')
                                                        <textarea name="AT_Inputs[{{ $attribute->AT_Id }}]" id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                            rows="4" placeholder="Enter {{ $attribute->AT_Inputs }}">{{ old('AT_Inputs.' . $attribute->AT_Id) }}</textarea>
                                                    @break

                                                    {{-- ================= NUMBER ================= --}}
                                                    @case('number')
                                                        <input type="number" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                            id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                            placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                            value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}">
                                                    @break

                                                    {{-- ================= EMAIL ================= --}}
                                                    @case('email')
                                                        <input type="email" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                            id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                            placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                            value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}">
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
                                                            value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}">
                                                    @break

                                                    {{-- ================= URL ================= --}}
                                                    @case('url')
                                                        <input type="url" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                            id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                            placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                            value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}">
                                                    @break

                                                    {{-- ================= DATE ================= --}}
                                                    @case('date')
                                                        <input type="date" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                            id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                            value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}">
                                                    @break

                                                    {{-- ================= DATETIME ================= --}}
                                                    @case('datetime')
                                                        <input type="datetime-local" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                            id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                            value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}">
                                                    @break

                                                    {{-- ================= TIME ================= --}}
                                                    @case('time')
                                                        <input type="time" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                            id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                            value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}">
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
                                                                    {{ old('AT_Inputs.' . $attribute->AT_Id) == $option ? 'selected' : '' }}>

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
                                                                    {{ old('AT_Inputs.' . $attribute->AT_Id) == $option ? 'checked' : '' }}>

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

                                                            $checkedValues = old('AT_Inputs.' . $attribute->AT_Id, []);

                                                            if (!is_array($checkedValues)) {
                                                                $checkedValues = [$checkedValues];
                                                            }

                                                        @endphp


                                                        @foreach (explode(',', $attribute->AT_Options) as $option)
                                                            @php
                                                                $option = trim($option);
                                                            @endphp

                                                            <div class="form-check form-check-inline">

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
                                                            value="{{ old('AT_Inputs.' . $attribute->AT_Id, '#000000') }}"
                                                            title="Choose {{ $attribute->AT_Inputs }}">
                                                    @break

                                                    {{-- ================= FILE ================= --}}
                                                    @case('file')
                                                        <input type="file" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                            id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                            accept="image/*">
                                                    @break

                                                    {{-- ================= DEFAULT ================= --}}

                                                    @default
                                                        <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                            id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control"
                                                            placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                            value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}">
                                                @endswitch


                                            </div>

                                        </div>
                                    @endforeach


                                    {{-- ================= SUBMIT ================= --}}
                                    <div class="text-end mt-4">

                                        <button type="submit" class="btn btn-primary">

                                            Submit

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>
                </div>

            </div><!-- container -->

            @include('includes.admin-footer')

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const category = document.getElementById('category');
            const subcategory = document.getElementById('subcategory');
            const attributeRows = document.querySelectorAll('.attribute-row');

            function filterSubcategories() {
                const selectedCategory = category.value;

                Array.from(subcategory.options).forEach(function(option) {
                    if (!option.value) {
                        option.hidden = false;
                        return;
                    }
                    option.hidden = option.dataset.category !== selectedCategory;
                });
            }

            function filterAttributes() {
                const selectedSubcategory = subcategory.value;

                attributeRows.forEach(function(row) {
                    row.style.display = row.dataset.subcategory === selectedSubcategory ? '' : 'none';
                });
            }

            category.addEventListener('change', function() {
                subcategory.value = '';
                filterSubcategories();
                filterAttributes();
            });

            subcategory.addEventListener('change', filterAttributes);

            filterSubcategories();
            filterAttributes();
        });
    </script>
@endsection

