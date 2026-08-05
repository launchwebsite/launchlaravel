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


                                {{-- <form action="{{ route('attributes.store') }}" method="POST" enctype="multipart/form-data"> --}}
                                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        {{-- Category --}}
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Category</label>

                                            <div class="col-sm-10">
                                                <select name="CT_Id" id="category" class="form-control" required>

                                                    <option value="">Select Category</option>

                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->CT_Id }}">
                                                            {{ $category->CT_Name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        {{-- Subcategory --}}
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Sub Category</label>

                                            <div class="col-sm-10">
                                                <select name="SC_Id" id="subcategory" class="form-control" disabled>

                                                    <option value="">Select Sub Category</option>

                                                    @foreach ($sub_categories as $subcategory)
                                                        <option value="{{ $subcategory->SC_Id }}"
                                                            data-category="{{ $subcategory->CT_Id }}"
                                                            style="display: none;">

                                                            {{ $subcategory->SC_Name }}

                                                        </option>
                                                    @endforeach

                                                </select>

                                                <small id="subcategory-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        {{-- Dynamic attributes --}}
                                        <div id="attribute-container">

                                            @foreach ($attributes as $attribute)
                                                <div class="mb-3 row attribute-row"
                                                    data-subcategory="{{ $attribute->SC_Id }}">

                                                    <label class="col-sm-2 col-form-label">
                                                        {{ $attribute->AT_Inputs }}
                                                    </label>

                                                    <div class="col-sm-10">

                                                        @switch($attribute->AT_Structure)
                                                            @case('string')
                                                            @case('text')
                                                                <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    class="form-control"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}">
                                                            @break

                                                            @case('number')
                                                                <input type="number" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    class="form-control"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}">
                                                            @break

                                                            @case('textarea')
                                                                <textarea name="AT_Inputs[{{ $attribute->AT_Id }}]" class="form-control" rows="4"></textarea>
                                                            @break

                                                            @default
                                                                <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    class="form-control">
                                                        @endswitch

                                                    </div>

                                                </div>
                                            @endforeach

                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-sm-12 text-end">
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

    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection
