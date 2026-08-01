@extends('vendor-layout.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h1 class="card-title mb-0">My Car Listings</h1>
                            <a href="{{ route('listings.cars.create') }}" class="btn btn-primary btn-sm">Add Car</a>
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
                                            <th>Title</th>
                                            <th>Brand / Model</th>
                                            <th>Price</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($listings as $key => $listing)
                                            <tr>
                                                <td>{{ $listings->firstItem() + $key }}</td>
                                                <td>{{ $listing->LS_Title }}</td>
                                                <td>{{ $listing->LS_Attributes['brand'] ?? '' }} {{ $listing->LS_Attributes['model'] ?? '' }}</td>
                                                <td>AED {{ number_format($listing->LS_Price, 2) }}</td>
                                                <td>{{ $listing->LS_City }}</td>
                                                <td>
                                                    <span class="badge {{ $listing->LS_Status == 1 ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ $listing->LS_Status == 1 ? 'Active' : 'Pending' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('listings.cars.edit', $listing->LS_Id) }}" class="btn btn-sm btn-outline-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('listings.cars.destroy', $listing->LS_Id) }}" method="POST" onsubmit="return confirm('Delete this listing?');" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-4">No car listings yet.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-3">
                                {{ $listings->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('vendor.footer')
    </div>
</div>
@endsection
