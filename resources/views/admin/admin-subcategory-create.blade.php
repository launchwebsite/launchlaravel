@extends('layouts.admin-layout')

@section('content')
    @include('includes.admin-header')
    @include('includes.admin-sidebar')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h1 class="card-title mb-0">Add Sub Category</h1>
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

                                <form action="{{ route('admin-subcategory-store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select name="CT_Id" class="form-select">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->CT_Id }}"
                                                    {{ old('CT_Id') == $category->CT_Id ? 'selected' : '' }}>
                                                    {{ $category->CT_Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Sub Category Name</label>
                                        <input type="text" name="SC_Name" class="form-control"
                                            value="{{ old('SC_Name') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Sub Category Image</label>
                                        <input type="file" name="SC_Img" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-success">Create Sub Category</button>
                                    <a href="{{ route('admin-subcategory') }}" class="btn btn-danger">Cancel</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('includes.admin-footer')
        </div>
    </div>
@endsection
