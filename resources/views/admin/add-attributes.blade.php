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
                                <div class="row align-items-center mb-2">
                                    <div class="col">
                                        <h4 class="card-title">Attributes</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">


                                <form
                                    action="{{ isset($attributes) ? route('attributes.update', \Vinkla\Hashids\Facades\Hashids::encode($attributes->AT_Id)) : route('attributes.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($attributes))
                                        @method('PUT')
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">


                                            <div class="mb-3 row">
                                                {{-- <label class="text-danger">*</label> --}}

                                                <div class="col-sm-10">
                                                    <select class="form-control" name="CT_Id" id="category" required>
                                                        <option value="">-- Select Category --</option>

                                                        @foreach ($categories as $category)
                                                            <option value="{{ \Vinkla\Hashids\Facades\Hashids::encode($category->CT_Id) }}"
                                                                {{ old('CT_Id', isset($attributes) ? \Vinkla\Hashids\Facades\Hashids::encode($attributes->CT_Id) : '') == \Vinkla\Hashids\Facades\Hashids::encode($category->CT_Id) ? 'selected' : '' }}>
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
                                                {{-- <label class="text-danger"></label> --}}

                                                <div class="col-sm-10">

                                                    <select class="form-control" name="SC_Id" id="subcategory">

                                                        <option value="">-- Select Sub Category --</option>

                                                        @foreach ($sub_categories as $sub_category)
                                                            <option value="{{ \Vinkla\Hashids\Facades\Hashids::encode($sub_category->SC_Id) }}"
                                                                data-category="{{ \Vinkla\Hashids\Facades\Hashids::encode($sub_category->CT_Id) }}"
                                                                style="display: none;"
                                                                {{ old('SC_Id', isset($attributes) ? \Vinkla\Hashids\Facades\Hashids::encode($attributes->SC_Id) : '') == \Vinkla\Hashids\Facades\Hashids::encode($sub_category->SC_Id) ? 'selected' : '' }}>

                                                                {{ $sub_category->SC_Name }}

                                                            </option>
                                                        @endforeach

                                                    </select>

                                                    {{-- <small id="subcategory-error" class="text-danger"></small> --}}

                                                </div>

                                                @error('SC_Id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            <div class="mb-3 row">

                                                <div class="col-sm-10">
                                                    <textarea id="AT_Inputs" name="AT_Inputs" placeholder="Enter AT_Inputs" rows="4" class="form-control">{{ old('AT_Inputs', $attributes->AT_Inputs ?? '') }}</textarea>

                                                </div>
                                                @error('AT_Inputs')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            <div class="mb-3 row">

                                                <div class="col-sm-10">
                                                    <textarea id="AT_Structure" name="AT_Structure" placeholder="Enter AT_Structure" rows="4" class="form-control">{{ old('AT_Structure', $attributes->AT_Structure ?? '') }}</textarea>

                                                </div>
                                                @error('AT_Structure')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            <div class="mb-3 row">

                                                <div class="col-sm-10">
                                                    <label>Options</label>
                                                    <textarea id="AT_Options" name="AT_Options" placeholder="Enter AT_Options" rows="4" class="form-control">{{ old('AT_Options', $attributes->AT_Options ?? '') }}</textarea>

                                                </div>
                                                @error('AT_Options')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="mb-3 row">

                                                <div class="col-sm-10">
                                                    <button
                                                        class="btn btn-primary float-end">{{ isset($attributes) ? 'Update' : 'Submit' }}</button>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

            $('#subcategory').click(function() {

                if ($('#category').val() === '') {

                    $('#subcategory-error').text(
                        'Please select a category first.'
                    );

                }

            });

            $('#category').change(function() {

                let categoryId = $(this).val();

                $('#subcategory-error').text('');

                $('#subcategory').val('');

                $('#subcategory option').hide();

                $('#subcategory option:first').show();

                if (categoryId === '') {

                    $('#subcategory').prop('disabled', true);

                    return;
                }

                $('#subcategory').prop('disabled', false);

                $('#subcategory option[data-category="' + categoryId + '"]').show();

            });

        });
    </script>
@endsection

