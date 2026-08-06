@extends('layouts.admin-layout')
@section('content')
    @include('includes.admin-header')
    @include('includes.admin-sidebar')
    <style>
        /* Select2 Container */
        .select2-container--default .select2-selection--single {
            background-color: #343a40;
            border: 1px solid #495057;
            color: #fff;
            height: 38px;
            border-radius: 5px;
        }

        /* Selected text */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #fff;
            line-height: 38px;
        }

        /* Dropdown arrow */
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #fff transparent transparent transparent;
        }

        /* Dropdown menu */
        .select2-dropdown {
            background-color: #343a40;
            border: 1px solid #495057;
        }

        /* Search input */
        .select2-search--dropdown .select2-search__field {
            background-color: #495057;
            color: #fff;
            border: 1px solid #6c757d;
        }

        /* Options */
        .select2-results__option {
            background-color: #343a40;
            color: #fff;
        }

        /* Hovered option */
        .select2-results__option--highlighted {
            background-color: #0d6efd !important;
            color: #fff !important;
        }

        /* Selected option */
        .select2-results__option[aria-selected="true"] {
            background-color: #495057;
        }
    </style>
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
                                        <h4 class="card-title">Jobs</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">


                                <form
                                    action="{{ isset($careers) ? route('career.update', $careers->CR_Id) : route('career.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($careers))
                                        @method('PUT')
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">


                                            <div class="mb-3 row">
                                                <label class="text-danger">*</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="CT_Id" required>

                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->CT_Id }}"
                                                                {{ old('CT_Id', $careers->CT_Id ?? '') == $category->CT_Id ? 'selected' : '' }}>
                                                                {{ $category->CT_Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                @error('CT_Id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="mb-3 row">
                                                <label class="text-danger">*</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="SC_Name" class="form-control"
                                                        list="subCategoryList"
                                                        placeholder="Sub Category"
                                                        value="{{ old('SC_Name', $careers->subCategory->SC_Name ?? '') }}"
                                                        autocomplete="off">

                                                    <datalist id="subCategoryList">
                                                        @foreach ($sub_categories as $sub_category)
                                                            <option value="{{ $sub_category->SC_Name }}">
                                                        @endforeach
                                                    </datalist>
                                                </div>

                                                @error('SC_Id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            <div class="mb-3 row">

                                                <div class="col-sm-12">
                                                    <textarea id="CR_Name" name="CR_Name" placeholder="Enter Job Position" rows="4" class="form-control">{{ old('CR_Name', $careers->CR_Name ?? '') }}</textarea>

                                                </div>
                                                @error('CR_Name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3 row">

                                                <div class="col-sm-12">
                                                    <textarea id="CR_Location" name="CR_Location" placeholder="Enter Job Location" rows="4" class="form-control">{{ old('CR_Location', $careers->CR_Location ?? '') }}</textarea>

                                                </div>
                                                @error('CR_Location')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="mb-3 row">

                                                <div class="col-sm-12">
                                                    <textarea id="CR_SalaryRange" name="CR_SalaryRange" placeholder="Enter SalaryRange" rows="4" class="form-control">{{ old('CR_SalaryRange', $careers->CR_SalaryRange ?? '') }}</textarea>

                                                </div>
                                                @error('CR_SalaryRange')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>




                                            <div class="mb-3 row">

                                                <div class="col-sm-12">
                                                    <textarea id="CR_Type" name="CR_Type" placeholder="Enter Job Type" rows="4" class="form-control">{{ old('CR_Type', $careers->CR_Type ?? '') }}</textarea>

                                                </div>
                                                @error('CR_Type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="mb-3 row">
                                                <label class="text-danger">* </label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" type="file" id="CR_Img"
                                                        name="CR_Img">
                                                </div>
                                                @if (isset($career) && $career->CR_Img)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('uploads/career/' . $career->CR_Img) }}"
                                                            width="100" alt="career Image">
                                                    </div>
                                                @endif

                                                @error('CR_Img')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror


                                            </div>








                                            <div class="mb-3 row">

                                                <div class="col-sm-10">
                                                    <button
                                                        class="btn btn-primary float-end">{{ isset($careers) ? 'Update' : 'Submit' }}</button>
                                                </div>
                                            </div>

                                </form>
                            </div>

                        </div> <!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
        @include('includes.admin-footer')
        <!--end footer-->
    </div>
    <!-- end page content -->
    </div>
    <!-- vendor js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.select2').select2({
            tags: true,
            width: '100%',
            placeholder: 'Search or add Sub Category',
            createTag: function(params) {
                var term = $.trim(params.term);

                if (term === '') {
                    return null;
                }

                return {
                    id: term,
                    text: term,
                    newTag: true
                };
            }
        });
    </script>
@endsection
