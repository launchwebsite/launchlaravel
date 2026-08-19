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
                                <h1 class="card-title mb-0">Edit Category</h1>
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

                                <form action="{{ route('admin-category-update', \Vinkla\Hashids\Facades\Hashids::encode($category->CT_Id)) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <input type="text" name="CT_Name" class="form-control"
                                            value="{{ old('CT_Name', $category->CT_Name) }}">
                                    </div>

                                    @if ($category->CT_Img)
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/uploads/categories/' . $category->CT_Img) }}"
                                                width="80" style="border-radius:6px;">
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label class="form-label">Replace Image</label>
                                        <input type="file" name="CT_Img" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-success">Update Category</button>
                                    <a href="{{ route('admin-category') }}" class="btn btn-danger">Cancel</a>
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

