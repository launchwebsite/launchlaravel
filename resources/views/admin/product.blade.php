@extends('layouts.admin-layout')
@section('content')
    @include('includes.admin-header')
    @include('includes.admin-sidebar')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-xxl">

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Products</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">


                                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">

                                            {{-- Category --}}
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
                                                            <option value="{{ $category->CT_Id }}">
                                                                {{ $category->CT_Name }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                    @error('CT_Id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>

                                            </div>

                                            {{-- Subcategory --}}
                                            <div class="mb-3 row">

                                                <label class="col-sm-2 col-form-label">
                                                    Sub Category
                                                </label>

                                                <div class="col-sm-10">

                                                    <select name="SC_Id" id="subcategory" class="form-control" disabled>

                                                        <option value="">
                                                            Select Sub Category
                                                        </option>

                                                        @foreach ($sub_categories as $subcategory)
                                                            <option value="{{ $subcategory->SC_Id }}"
                                                                data-category="{{ $subcategory->CT_Id }}"
                                                                style="display:none;">

                                                                {{ $subcategory->SC_Name }}

                                                            </option>
                                                        @endforeach

                                                    </select>

                                                    @error('SC_Id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>

                                            </div>


                                            {{-- @foreach ($attributes as $attribute)
                                                <div class="mb-3 row"> --}}
                                            @foreach ($attributes as $attribute)
                                                <div class="mb-3 row attribute-row"
                                                    data-subcategory="{{ $attribute->SC_Id }}" style="display: none;">

                                                    <label class="col-sm-2 col-form-label">
                                                        {{ $attribute->AT_Inputs }}
                                                    </label>

                                                    <div class="col-sm-10">
                                                        @switch($attribute->AT_Structure)
                                                            {{-- Single line text --}}
                                                            @case('string')
                                                            @case('text')
                                                                <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Multi line text --}}
                                                            @case('textarea')
                                                                <textarea name="AT_Inputs[{{ $attribute->AT_Id }}]" id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}" rows="4" class="form-control">{{ old('AT_Inputs.' . $attribute->AT_Id) }}</textarea>
                                                            @break

                                                            {{-- Number --}}
                                                            @case('number')
                                                                <input type="number" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Email --}}
                                                            @case('email')
                                                                <input type="email" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Password --}}
                                                            @case('password')
                                                                <input type="password" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Phone --}}
                                                            @case('tel')
                                                                <input type="tel" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- URL --}}
                                                            @case('url')
                                                                <input type="url" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Date --}}
                                                            @case('date')
                                                                <input type="date" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Date + Time --}}
                                                            @case('datetime')
                                                                <input type="datetime-local"
                                                                    name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Time --}}
                                                            @case('time')
                                                                <input type="time" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- File upload --}}
                                                            @case('file')
                                                                <input type="file" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control">
                                                            @break

                                                            {{-- Checkbox (single true/false) --}}
                                                            @case('checkbox')
                                                                <div class="d-flex flex-wrap gap-4">

                                                                    @foreach (explode(',', $attribute->AT_Options) as $option)
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="AT_Inputs[{{ $attribute->AT_Id }}][]"
                                                                                id="check_{{ $attribute->AT_Id }}_{{ Str::slug($option) }}"
                                                                                value="{{ trim($option) }}"
                                                                                {{ in_array(trim($option), old('AT_Inputs.' . $attribute->AT_Id, [])) ? 'checked' : '' }}>

                                                                            <label class="form-check-label"
                                                                                for="check_{{ $attribute->AT_Id }}_{{ Str::slug($option) }}">
                                                                                {{ trim($option) }}
                                                                            </label>
                                                                        </div>
                                                                    @endforeach

                                                                </div>
                                                            @break

                                                            {{-- Radio (Yes/No example — customize as needed) --}}
                                                            @case('radio')
                                                                <div class="d-flex flex-wrap gap-4">

                                                                    @foreach (explode(',', $attribute->AT_Options) as $option)
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                                id="radio_{{ $attribute->AT_Id }}_{{ Str::slug($option) }}"
                                                                                value="{{ trim($option) }}"
                                                                                {{ old('AT_Inputs.' . $attribute->AT_Id) == trim($option) ? 'checked' : '' }}>

                                                                            <label class="form-check-label"
                                                                                for="radio_{{ $attribute->AT_Id }}_{{ Str::slug($option) }}">
                                                                                {{ trim($option) }}
                                                                            </label>
                                                                        </div>
                                                                    @endforeach

                                                                </div>
                                                            @break

                                                            {{-- Select dropdown (options come from AT_Options column, comma separated) --}}
                                                            @case('select')
                                                                <select name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    class="form-control">

                                                                    <option value="">Select {{ $attribute->AT_Inputs }}
                                                                    </option>

                                                                    @foreach (explode(',', $attribute->AT_Options) as $option)
                                                                        <option value="{{ trim($option) }}">
                                                                            {{ trim($option) }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            @break

                                                            {{-- Color picker --}}
                                                            @case('color')
                                                                <input type="color" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id, '#000000') }}"
                                                                    class="form-control form-control-color">
                                                            @break

                                                            {{-- Fallback --}}

                                                            @default
                                                                <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                        @endswitch

                                                        @error('AT_Inputs.' . $attribute->AT_Id)
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="text-end">

                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>

                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div> <!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->




        <!--end footer-->
    </div>
    <!-- end page content -->

    </div>

    <script>
        $('#category').change(function() {

            let categoryId = $(this).val();

            $('#subcategory').prop('disabled', categoryId === '');

            $('#subcategory').val('');

            $('#subcategory option').hide();

            $('#subcategory option:first').show();

            $('.attribute-row').hide();

            if (categoryId) {

                $('#subcategory option[data-category="' + categoryId + '"]').show();

            }

        });

        $('#subcategory').change(function() {

            let subcategoryId = $(this).val();

            $('.attribute-row').hide();

            $('.attribute-row[data-subcategory="' + subcategoryId + '"]').show();

        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection
