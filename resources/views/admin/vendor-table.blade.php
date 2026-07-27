@extends('layouts.admin-layout')

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
                                <h1 class="card-title mb-0">Vendor List</h1>
                            </div>

                            <div class="card-body">

                                {{-- @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif --}}

                                <div class="table-responsive">

                                    <table class="table table-bordered table-hover align-middle mb-0">

                                        <thead class="color-head">
                                            <tr>
                                                <th>#</th>
                                                <th width="200">Name</th>
                                                <th width="200">Email</th>
                                                <th width="200">Phone</th>
                                                <th width="250">Type</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse($vendors as $key => $vendor)
                                                <tr>

                                                    <td>{{ $vendors->firstItem() + $key }}</td>

                                                    <td>{{ $vendor->VR_Name }}</td>

                                                    <td>{{ $vendor->VR_Email_1 }}</td>

                                                    <td>{{ $vendor->VR_Phone }}</td>

                                                    <td>{{ $vendor->VR_Type }}</td>

                                                    <td>
                                                        <form
                                                            action="{{ route('admin.vendor.toggle-status', $vendor->VR_Id) }}"
                                                            method="POST">
                                                            @csrf

                                                            <button type="submit"
                                                                class="badge border-0 {{ $vendor->VR_Status == 1 ? 'bg-success' : 'bg-danger' }}"
                                                                style="cursor:pointer;">
                                                                {{ $vendor->VR_Status == 1 ? 'Verified' : 'Pending' }}
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>

                                            @empty

                                                <tr>
                                                    <td colspan="6" class="text-center py-4">
                                                        No vendors found.
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>

                                </div>

                                <div class="mt-3">
                                    {{ $vendors->links() }}
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
