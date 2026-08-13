@extends('vendor-layout.app')
@section('content')
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
                                        <h4 class="card-title">Jobs
                                            <a href="{{ route('vendor.career.add') }}"class="btn btn-info float-end">
                                                Add Jobs</a>
                                        </h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table datatable" id="datatable_1">
                                        <thead class="table-light">
                                            <tr class="">
                                                <th>SL No.</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Career Name</th>
                                                <th>Salary Range</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            @foreach ($careers as $index => $career)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $career->category->CT_Name ?? '' }}</td>
                                                    <td>{{ $career->subcategory->SC_Name ?? '' }}</td>
                                                    <td>{{ $career->CR_Name ?? '' }}</td>
                                                    <td>{{ $career->CR_SalaryRange ?? '' }}</td>


                                                    <td>
                                                        <a href="{{ route('vendor.career.edit', $career->CR_Id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('vendor.career.delete', $career->CR_Id) }}"
                                                            class="btn btn-sm btn-danger"onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div> <!--end col-->
                </div><!--end row-->
            </div><!-- container -->
            @include('vendor.footer')

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
@endsection
