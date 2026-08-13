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
                                        <h4 class="card-title">Candidates Applications

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
                                                <th>Job Post</th>
                                                <th>Candidate Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Job Type</th>
                                                <th>Resume</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            @foreach ($applications as $index => $application)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $application->career->CR_Name ?? '' }}</td>
                                                    <td>{{ $application->CA_Name ?? '' }}</td>
                                                    <td>{{ $application->CA_Email ?? '' }}</td>
                                                    <td>{{ $application->CA_Phone ?? '' }}</td>
                                                    <td>{{ $application->CA_JobType ?? '' }}</td>

                                                    <td>
                                                        @if ($application->CA_Resume)
                                                            <button type="button" class="btn btn-sm btn-outline-warning"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#resumeModal{{ $application->CA_Id }}">
                                                                <i class="fas fa-file-pdf"></i>
                                                                View Resume
                                                            </button>
                                                        @else
                                                            <span class="text-muted">No Resume</span>
                                                        @endif
                                                    </td>
                                                </tr>

                                                {{-- Resume Modal --}}
                                                @if ($application->CA_Resume)
                                                    <div class="modal fade" id="resumeModal{{ $application->CA_Id }}"
                                                        tabindex="-1" aria-hidden="true">

                                                        <div class="modal-dialog modal-xl modal-dialog-centered">

                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">
                                                                        Resume - {{ $application->CA_Name }}
                                                                    </h5>

                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body p-0">

                                                                    <iframe
                                                                        src="{{ asset('storage/' . $application->CA_Resume) }}"
                                                                        width="100%" height="600px" style="border: none;">
                                                                    </iframe>

                                                                </div>

                                                                <div class="modal-footer">

                                                                    <a href="{{ asset('storage/' . $application->CA_Resume) }}"
                                                                        class="btn btn-warning" download>
                                                                        <i class="fas fa-download"></i>
                                                                        Download Resume
                                                                    </a>

                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
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
