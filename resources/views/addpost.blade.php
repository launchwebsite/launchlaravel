@extends('layouts.layout')
@section('content')
    @include('includes.header')
    @include('includes.sidebar')

    <!--=====================================
                                                  SINGLE BANNER PART START
                                        =======================================-->
    <section class="single-banner dashboard-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>ad post</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                                                  SINGLE BANNER PART END
                                        =======================================-->



    <section class="adpost-part mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('vendoraddpost.store') }}" method="POST" enctype="multipart/form-data">
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
                                                    data-category="{{ $subcategory->CT_Id }}">
                                                    {{ $subcategory->SC_Name }}
                                                </option>
                                            @endforeach

                                        </select>

                                        @error('SC_Id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                </div>





                                @foreach ($attributes as $attribute)
                                    <div class="mb-3 row attribute-row" data-subcategory="{{ $attribute->SC_Id }}"
                                        style="display: none;">

                                        <label class="col-sm-2 col-form-label">
                                            {{ $attribute->AT_Inputs }}
                                        </label>

                                        <div class="col-sm-10">

                                            @switch($attribute->AT_Structure)
                                                {{-- String / Text --}}
                                                @case('string')
                                                @case('text')
                                                    <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                        id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                        placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                        value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}" class="form-control">
                                                @break

                                                {{-- Textarea --}}
                                                @case('textarea')
                                                    <textarea name="AT_Inputs[{{ $attribute->AT_Id }}]" id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                        placeholder="Enter {{ $attribute->AT_Inputs }}" rows="4" class="form-control">{{ old('AT_Inputs.' . $attribute->AT_Id) }}</textarea>
                                                @break

                                                {{-- Number --}}
                                                @case('number')
                                                    <input type="number" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                        id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                        placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                        value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}" class="form-control">
                                                @break

                                                {{-- Email --}}
                                                @case('email')
                                                    <input type="email" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                        id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                        placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                        value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}" class="form-control">
                                                @break

                                                {{-- Select --}}
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

                                                {{-- Radio --}}
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

                                                {{-- Checkbox --}}
                                                @case('checkbox')
                                                    @php
                                                        $checkedValues = old('AT_Inputs.' . $attribute->AT_Id, []);

                                                        // Convert single value to array if necessary
                                                        if (!is_array($checkedValues)) {
                                                            $checkedValues = [$checkedValues];
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

                                                {{-- Color --}}
                                                @case('color')
                                                    <input type="color" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                        id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                        value="{{ old('AT_Inputs.' . $attribute->AT_Id, '#000000') }}"
                                                        class="form-control form-control-color"
                                                        title="Choose {{ $attribute->AT_Inputs }}">
                                                @break

                                                {{-- File --}}
                                                @case('file')
                                                    <input type="file" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                        id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control">
                                                @break

                                                {{-- Default --}}

                                                @default
                                                    <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                        id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                        placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                        value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}" class="form-control">
                                            @endswitch

                                        </div>
                                    </div>
                                @endforeach


                                <div class="section seller-info mt-5 mb-5">
                                    <h4>Seller Information</h4>
                                    <hr>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Condition<span
                                                class="required">*</span></label>
                                        <div class="col-sm-9 checkblack">
                                            <select name="VR_Type" class="form-control">

                                                <option value="private-company">Private Company
                                                </option>
                                                <option value="self-employed">Self-Employed</option>
                                            </select>
                                            @error('VR_Type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Your Name<span
                                                class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="VR_Name" class="form-control"
                                                placeholder="ex, Jhon Doe" />
                                            @error('VR_Name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Your Email ID<span
                                                class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="email" name="VR_Email_1" class="form-control"
                                                placeholder="ex, jhondoe@mail.com" />
                                            @error('VR_Email_1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                     <div class="row form-group">
                                        <label class="col-sm-3 label-title">Password<span
                                                class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="VR_Password" class="form-control"
                                                placeholder="ex, 1234!@#" />
                                            @error('VR_Password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                     <div class="row form-group">
                                        <label class="col-sm-3 label-title">Email 2<span
                                                class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="email" name="VR_Email_2" class="form-control"
                                                placeholder="ex, jhondoe@mail.com" />
                                            @error('VR_Email_2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Mobile Number<span
                                                class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" name="VR_Phone" class="form-control"
                                                placeholder="ex, +912457895" />
                                            @error('VR_Phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <div class="text-end">

                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Quick rules</h3>
                            <button data-bs-dismiss="alert">close</button>
                        </div>
                        <ul class="account-card-text">
                            <li>
                                <p>Make sure you post in the correct category.</p>
                            </li>
                            <li>
                                <p>Do not post the same ad more than once or repost an ad within 48 hours.</p>
                            </li>
                            <li>
                                <p>Do not upload pictures with watermarks.</p>
                            </li>
                            <li>
                                <p>Do not post ads containing multiple items unless it's a package deal.</p>
                            </li>
                            <li>
                                <p>Do not put your email or phone numbers in the title or description.</p>
                            </li>
                            <li>
                                <p>Make sure you post in the correct category.</p>
                            </li>
                            <li>
                                <p>Do not post the same ad more than once or repost an ad within 48 hours.</p>
                            </li>
                            <li>
                                <p>Do not upload pictures with watermarks.</p>
                            </li>
                            <li>
                                <p>Do not post ads containing multiple items unless it's a package deal.</p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                                                    ADPOST PART END
                                        =======================================-->


    @include('includes.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const category = document.getElementById('category');
            const subcategory = document.getElementById('subcategory');

            const attributeRows = document.querySelectorAll('.attribute-row');

            /*
            |--------------------------------------------------------------------------
            | Category -> Subcategory
            |--------------------------------------------------------------------------
            */

            category.addEventListener('change', function() {

                const selectedCategory = this.value;

                // Reset subcategory
                subcategory.value = '';

                // Disable if no category selected
                if (!selectedCategory) {
                    subcategory.disabled = true;

                    // Hide all attributes
                    attributeRows.forEach(function(row) {
                        row.style.display = 'none';
                    });

                    return;
                }

                // Enable subcategory
                subcategory.disabled = false;

                let firstMatchingSubcategory = null;

                // Loop through all subcategory options
                Array.from(subcategory.options).forEach(function(option) {

                    if (!option.value) {
                        option.hidden = false;
                        return;
                    }

                    const optionCategory = option.dataset.category;

                    if (optionCategory === selectedCategory) {

                        option.hidden = false;

                        // Store first matching subcategory
                        if (!firstMatchingSubcategory) {
                            firstMatchingSubcategory = option.value;
                        }

                    } else {

                        option.hidden = true;

                    }
                });

                /*
                 * If you want the first subcategory to be
                 * automatically selected, uncomment this:
                 *
                 * subcategory.value = firstMatchingSubcategory;
                 * subcategory.dispatchEvent(new Event('change'));
                 */

                // Hide all attributes until subcategory is selected
                attributeRows.forEach(function(row) {
                    row.style.display = 'none';
                });
            });


            /*
            |--------------------------------------------------------------------------
            | Subcategory -> Attributes
            |--------------------------------------------------------------------------
            */

            subcategory.addEventListener('change', function() {

                const selectedSubcategory = this.value;

                // Hide all attributes first
                attributeRows.forEach(function(row) {

                    const rowSubcategory = row.dataset.subcategory;

                    if (
                        selectedSubcategory &&
                        rowSubcategory === selectedSubcategory
                    ) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }

                });

            });

        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection
