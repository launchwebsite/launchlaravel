@extends('layouts.admin-layout')

@section('content')
    @include('includes.admin-header')
    @include('includes.admin-sidebar')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="card mt-4 mb-4">
                            <div class="card-header">
                                <h1 class="card-title mb-0">Edit Vendor</h1>
                            </div>

                            <div class="card-body">

                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}

                                <form action="{{ route('admin.vendor.update', $vendor->VR_Id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Vendor Name</label>
                                        <input type="text" name="VR_Name" class="form-control"
                                            value="{{ old('VR_Name', $vendor->VR_Name) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="VR_Phone" class="form-control"
                                            value="{{ old('VR_Phone', $vendor->VR_Phone) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select name="CT_Id" id="CT_Id" class="form-select">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->CT_Id }}"
                                                    {{ old('CT_Id', $vendor->CT_Id) == $category->CT_Id ? 'selected' : '' }}>
                                                    {{ $category->CT_Name }}
                                                </option>
                                            @endforeach
                                            <option value="new" {{ old('CT_Id') == 'new' ? 'selected' : '' }}>
                                                + Add New Category
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3" id="new_category_wrap"
                                        style="display: {{ old('CT_Id') == 'new' ? 'block' : 'none' }};">
                                        <label class="form-label">New Category Name</label>
                                        <input type="text" name="new_category" class="form-control"
                                            value="{{ old('new_category') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Vendor Type</label>
                                        <select name="VR_Type" class="form-select">
                                            <option value="private-company"
                                                {{ old('VR_Type', $vendor->VR_Type) == 'private-company' ? 'selected' : '' }}>
                                                Private Company
                                            </option>
                                            <option value="self-employed"
                                                {{ old('VR_Type', $vendor->VR_Type) == 'self-employed' ? 'selected' : '' }}>
                                                Self Employed
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="VR_Email_1" class="form-control"
                                            value="{{ old('VR_Email_1', $vendor->VR_Email_1) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alternate Email (optional)</label>
                                        <input type="email" name="VR_Email_2" class="form-control"
                                            value="{{ old('VR_Email_2', $vendor->VR_Email_2) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="VR_Password" id="VR_Password" class="form-control"
                                                placeholder="Leave blank to keep current password">
                                            <button type="button" class="btn btn-outline-secondary toggle-password"
                                                data-target="VR_Password">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success">Update Vendor</button>
                                    <a href="{{ route('admin.vendor') }}" class="btn btn-danger">Cancel</a>
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
        document.getElementById('CT_Id').addEventListener('change', function() {
            document.getElementById('new_category_wrap').style.display =
                this.value === 'new' ? 'block' : 'none';
        });
    </script>
@endsection
