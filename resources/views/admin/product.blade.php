@extends('layouts.admin-layout')

@section('content')

@include('includes.admin-header')
@include('includes.admin-sidebar')

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

                        <form action="{{ route('products.store') }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            {{-- =========================================
                                 CATEGORY
                            ========================================== --}}
                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    Category
                                </label>

                                <div class="col-sm-10">

                                    <select name="CT_Id"
                                            id="category"
                                            class="form-control">

                                        <option value="">
                                            Select Category
                                        </option>

                                        @foreach ($categories as $category)

                                            <option value="{{ $category->CT_Id }}"
                                                {{ old('CT_Id') == $category->CT_Id ? 'selected' : '' }}>

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


                            {{-- =========================================
                                 SUBCATEGORY
                            ========================================== --}}
                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    Sub Category
                                </label>

                                <div class="col-sm-10">

                                    <select name="SC_Id"
                                            id="subcategory"
                                            class="form-control"
                                            disabled>

                                        <option value="">
                                            Select Sub Category
                                        </option>

                                    </select>

                                    <span id="subcategory-error"
                                          class="text-danger"></span>

                                    @error('SC_Id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>


                            {{-- =========================================
                                 AJAX ATTRIBUTE CONTAINER
                            ========================================== --}}

                            <div id="attribute-container">

                                {{-- Attributes will be loaded here by AJAX --}}

                            </div>


                            {{-- =========================================
                                 SUBMIT
                            ========================================== --}}

                            <div class="text-end mt-4">

                                <button type="submit"
                                        class="btn btn-primary">

                                    Submit

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>


{{-- ============================================================
     JQUERY
============================================================= --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | CATEGORY CHANGE
    |--------------------------------------------------------------------------
    */

    $('#category').on('change', function () {

        let categoryId = $(this).val();

        /*
        |--------------------------------------------------------------------------
        | RESET SUBCATEGORY
        |--------------------------------------------------------------------------
        */

        $('#subcategory')
            .prop('disabled', true)
            .html(`
                <option value="">
                    Select Sub Category
                </option>
            `);

        /*
        |--------------------------------------------------------------------------
        | RESET ATTRIBUTES
        |--------------------------------------------------------------------------
        */

        $('#attribute-container').html('');

        /*
        |--------------------------------------------------------------------------
        | IF CATEGORY IS NOT SELECTED
        |--------------------------------------------------------------------------
        */

        if (!categoryId) {

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | SHOW LOADING
        |--------------------------------------------------------------------------
        */

        $('#subcategory').html(`
            <option value="">
                Loading subcategories...
            </option>
        `);


        /*
        |--------------------------------------------------------------------------
        | AJAX - GET SUBCATEGORIES
        |--------------------------------------------------------------------------
        */

        $.ajax({

            url: '/category/' + categoryId + '/subcategories',

            type: 'GET',

            dataType: 'json',

            success: function (response) {

                let options = `
                    <option value="">
                        Select Sub Category
                    </option>
                `;


                /*
                |--------------------------------------------------------------------------
                | NO SUBCATEGORIES
                |--------------------------------------------------------------------------
                */

                if (response.length === 0) {

                    options = `
                        <option value="">
                            No Sub Categories Found
                        </option>
                    `;

                    $('#subcategory')
                        .html(options)
                        .prop('disabled', true);

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | ADD SUBCATEGORIES
                |--------------------------------------------------------------------------
                */

                response.forEach(function (subcategory) {

                    options += `
                        <option value="${subcategory.SC_Id}">
                            ${subcategory.SC_Name}
                        </option>
                    `;

                });


                /*
                |--------------------------------------------------------------------------
                | UPDATE DROPDOWN
                |--------------------------------------------------------------------------
                */

                $('#subcategory')
                    .html(options)
                    .prop('disabled', false);

            },


            error: function (xhr) {

                console.log(xhr.responseText);

                $('#subcategory')
                    .html(`
                        <option value="">
                            Unable to load subcategories
                        </option>
                    `)
                    .prop('disabled', true);

            }

        });

    });



    /*
    |--------------------------------------------------------------------------
    | SUBCATEGORY CHANGE
    |--------------------------------------------------------------------------
    */

    $('#subcategory').on('change', function () {

        let subCategoryId = $(this).val();


        /*
        |--------------------------------------------------------------------------
        | CLEAR OLD ATTRIBUTES
        |--------------------------------------------------------------------------
        */

        $('#attribute-container').html('');


        /*
        |--------------------------------------------------------------------------
        | NOTHING SELECTED
        |--------------------------------------------------------------------------
        */

        if (!subCategoryId) {

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | LOADING
        |--------------------------------------------------------------------------
        */

        $('#attribute-container').html(`
            <div class="alert alert-info">
                Loading attributes...
            </div>
        `);


        /*
        |--------------------------------------------------------------------------
        | AJAX - GET ATTRIBUTES
        |--------------------------------------------------------------------------
        */

        $.ajax({

            url: '/subcategory/' + subCategoryId + '/attributes',

            type: 'GET',

            dataType: 'json',

            success: function (response) {

                let html = '';


                /*
                |--------------------------------------------------------------------------
                | NO ATTRIBUTES
                |--------------------------------------------------------------------------
                */

                if (response.length === 0) {

                    $('#attribute-container').html(`
                        <div class="alert alert-warning">
                            No attributes found for this subcategory.
                        </div>
                    `);

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | CREATE ATTRIBUTE FIELDS
                |--------------------------------------------------------------------------
                */

                response.forEach(function (attribute) {

                    let type = attribute.AT_Structure;

                    let attributeId = attribute.AT_Id;

                    let attributeName = attribute.AT_Inputs;

                    let options = attribute.AT_Options;


                    /*
                    |--------------------------------------------------------------------------
                    | STRING -> TEXT
                    |--------------------------------------------------------------------------
                    */

                    if (type === 'string') {

                        type = 'text';

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | TEXT / NUMBER / EMAIL / PASSWORD / TEL / URL
                    |--------------------------------------------------------------------------
                    */

                    if (
                        type === 'text' ||
                        type === 'number' ||
                        type === 'email' ||
                        type === 'password' ||
                        type === 'tel' ||
                        type === 'url' ||
                        type === 'date' ||
                        type === 'time'
                    ) {

                        html += `

                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    ${attributeName}
                                </label>

                                <div class="col-sm-10">

                                    <input
                                        type="${type}"
                                        name="AT_Inputs[${attributeId}]"
                                        class="form-control"
                                        placeholder="Enter ${attributeName}"
                                    >

                                </div>

                            </div>

                        `;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | TEXTAREA
                    |--------------------------------------------------------------------------
                    */

                    else if (type === 'textarea') {

                        html += `

                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    ${attributeName}
                                </label>

                                <div class="col-sm-10">

                                    <textarea
                                        name="AT_Inputs[${attributeId}]"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Enter ${attributeName}"
                                    ></textarea>

                                </div>

                            </div>

                        `;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | DATETIME
                    |--------------------------------------------------------------------------
                    */

                    else if (type === 'datetime') {

                        html += `

                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    ${attributeName}
                                </label>

                                <div class="col-sm-10">

                                    <input
                                        type="datetime-local"
                                        name="AT_Inputs[${attributeId}]"
                                        class="form-control"
                                    >

                                </div>

                            </div>

                        `;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | COLOR
                    |--------------------------------------------------------------------------
                    */

                    else if (type === 'color') {

                        html += `

                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    ${attributeName}
                                </label>

                                <div class="col-sm-10">

                                    <input
                                        type="color"
                                        name="AT_Inputs[${attributeId}]"
                                        value="#000000"
                                        class="form-control form-control-color"
                                    >

                                </div>

                            </div>

                        `;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | FILE
                    |--------------------------------------------------------------------------
                    */

                    else if (type === 'file') {

                        html += `

                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    ${attributeName}
                                </label>

                                <div class="col-sm-10">

                                    <input
                                        type="file"
                                        name="AT_Inputs[${attributeId}]"
                                        class="form-control"
                                        accept="image/*"
                                    >

                                </div>

                            </div>

                        `;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | SELECT
                    |--------------------------------------------------------------------------
                    */

                    else if (type === 'select') {

                        let selectOptions = `
                            <option value="">
                                Select ${attributeName}
                            </option>
                        `;


                        if (options) {

                            options.split(',').forEach(function (option) {

                                option = option.trim();

                                selectOptions += `
                                    <option value="${option}">
                                        ${option}
                                    </option>
                                `;

                            });

                        }


                        html += `

                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    ${attributeName}
                                </label>

                                <div class="col-sm-10">

                                    <select
                                        name="AT_Inputs[${attributeId}]"
                                        class="form-control">

                                        ${selectOptions}

                                    </select>

                                </div>

                            </div>

                        `;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | RADIO
                    |--------------------------------------------------------------------------
                    */

                    else if (type === 'radio') {

                        let radioHtml = '';

                        if (options) {

                            options.split(',').forEach(function (option, index) {

                                option = option.trim();

                                radioHtml += `

                                    <div class="form-check form-check-inline">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="AT_Inputs[${attributeId}]"
                                            id="radio_${attributeId}_${index}"
                                            value="${option}"
                                        >

                                        <label
                                            class="form-check-label"
                                            for="radio_${attributeId}_${index}">

                                            ${option}

                                        </label>

                                    </div>

                                `;

                            });

                        }


                        html += `

                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    ${attributeName}
                                </label>

                                <div class="col-sm-10">

                                    ${radioHtml}

                                </div>

                            </div>

                        `;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | CHECKBOX
                    |--------------------------------------------------------------------------
                    */

                    else if (type === 'checkbox') {

                        let checkboxHtml = '';

                        if (options) {

                            options.split(',').forEach(function (option, index) {

                                option = option.trim();

                                checkboxHtml += `

                                    <div class="form-check form-check-inline">

                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="AT_Inputs[${attributeId}][]"
                                            id="checkbox_${attributeId}_${index}"
                                            value="${option}"
                                        >

                                        <label
                                            class="form-check-label"
                                            for="checkbox_${attributeId}_${index}">

                                            ${option}

                                        </label>

                                    </div>

                                `;

                            });

                        }


                        html += `

                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    ${attributeName}
                                </label>

                                <div class="col-sm-10">

                                    ${checkboxHtml}

                                </div>

                            </div>

                        `;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | DEFAULT
                    |--------------------------------------------------------------------------
                    */

                    else {

                        html += `

                            <div class="mb-3 row">

                                <label class="col-sm-2 col-form-label">
                                    ${attributeName}
                                </label>

                                <div class="col-sm-10">

                                    <input
                                        type="text"
                                        name="AT_Inputs[${attributeId}]"
                                        class="form-control"
                                        placeholder="Enter ${attributeName}"
                                    >

                                </div>

                            </div>

                        `;

                    }

                });


                /*
                |--------------------------------------------------------------------------
                | DISPLAY ATTRIBUTES
                |--------------------------------------------------------------------------
                */

                $('#attribute-container').html(html);

            },


            error: function (xhr) {

                console.log(xhr.responseText);

                $('#attribute-container').html(`

                    <div class="alert alert-danger">

                        Unable to load attributes.

                    </div>

                `);

            }

        });

    });

});

</script>

@endsection
