@extends('layouts.admin-layout')

@use(Illuminate\Support\Facades\Crypt)

@section('content')
    @include('includes.admin-header')
    @include('includes.admin-sidebar')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h1 class="card-title mb-0">Category List</h1>
                                <a href="{{ route('admin-category-create') }}" class="btn btn-primary btn-add btn-sm">Add
                                    Category</a>
                            </div>

                            <div class="card-body">

                                {{-- @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif --}}

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle mb-0">
                                        <thead class="color-head">
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($categories as $key => $category)
                                                <tr>
                                                    <td>{{ $categories->firstItem() + $key }}</td>
                                                    <td>
                                                        @if ($category->CT_Img)
                                                            <img src="{{ asset('storage/uploads/categories/' . $category->CT_Img) }}"
                                                                width="50" height="50"
                                                                style="object-fit:cover;border-radius:6px;">
                                                        @else
                                                            —
                                                        @endif
                                                    </td>
                                                    <td>{{ $category->CT_Name }}</td>
                                                    <td>
                                                        <form action="{{ route('admin-category-edit') }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $category->CT_Id }}">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success btn-outline-success">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </form>
                                                        <form
                                                            action="{{ route('admin-category-delete', Crypt::encryptString($category->CT_Id)) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Delete this category?');"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger btn-outline-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center py-4">No categories found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    {{ $categories->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('includes.admin-footer')
        </div>
    </div>
@endsection
