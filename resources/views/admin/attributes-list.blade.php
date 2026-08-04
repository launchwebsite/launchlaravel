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
                                        <h4 class="card-title">Attributes
                                            <a href="{{ route('attributes.add') }}"class="btn btn-info float-end">
                                                Add Attributes</a>
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
                                                <th>Attributes Name</th>
                                                <th>Attributes Structure</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            @foreach ($attributes as $index => $attribute)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $attribute->category->CT_Name ?? '' }}</td>
                                                    <td>{{ $attribute->subcategory->SC_Name ?? '' }}</td>
                                                     <td>{{ $attribute->AT_Inputs ?? '' }}</td>
                                                    <td>{{ $attribute->AT_Structure ?? '' }}</td>


                                                    <td>
                                                        <a href="{{ route('attributes.edit', $attribute->AT_Id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('attributes.delete', $attribute->AT_Id) }}"
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


             @include('includes.admin-footer')

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
@endsection
