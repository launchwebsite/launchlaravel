@extends('layouts.layout')
@section('content')
    @include('includes.header')
    @include('includes.sidebar')

    <section class="adpost-part mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">

                </div>
                <div class="col-lg-8">
                    <form action="{{ route('storeApplication') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="CR_Id" value="{{ $career->CR_Id }}">

                        <fieldset>
                            <div class="section postdetails">

                                <h3 class="mb-4">
                                    Employee Details
                                    <span class="pull-right float-end text-danger fs-6">
                                        *Mandatory Fields
                                    </span>
                                </h3>

                                <hr>

                                {{-- Name --}}
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">
                                        Name <span class="required">*</span>
                                    </label>

                                    <div class="col-sm-9 greeny">
                                        <input type="text" class="form-control" name="CA_Name"
                                            value="{{ old('CA_Name') }}" placeholder="Enter your name" required>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">
                                        Email <span class="required">*</span>
                                    </label>

                                    <div class="col-sm-9 greeny">
                                        <input type="email" class="form-control" name="CA_Email"
                                            value="{{ old('CA_Email') }}" placeholder="Enter your email" required>
                                    </div>
                                </div>

                                {{-- Phone --}}
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">
                                        Phone Number <span class="required">*</span>
                                    </label>

                                    <div class="col-sm-9 greeny">
                                        <input type="text" class="form-control" name="CA_Phone"
                                            value="{{ old('CA_Phone') }}" placeholder="Enter your number" required>
                                    </div>
                                </div>

                                {{-- Job Type --}}
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">
                                        What type of job is it?
                                        <span class="required">*</span>
                                    </label>

                                    <div class="col-sm-9 greeny">
                                        <select class="form-control" name="CA_JobType" required>
                                            <option value="">Select Job Type</option>
                                            <option value="Full-time">Full-time</option>
                                            <option value="Part-time">Part-time</option>
                                            <option value="Temporary">Temporary</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Commission only">Commission only</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Resume --}}
                                <div class="row form-group add-image">
                                    <label class="col-sm-3 label-title">
                                        Upload Resume <span class="required">*</span>
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="upload-wrapper">

                                            <label for="resume" class="upload-box">
                                                <i class="fa fa-cloud-upload upload-icon"></i>

                                                <h5>Upload Your Resume</h5>

                                                <p>
                                                    or <span>Browse File</span>
                                                </p>

                                                <small>
                                                    PDF, DOC, DOCX • Max 5MB
                                                </small>

                                                <input type="file" id="resume" name="CA_Resume"
                                                    accept=".pdf,.doc,.docx" hidden required>
                                            </label>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button type="submit"
                                class="btn btn-outline-warning ithaan-post-btn mt-2 mb-5 text-dark bg-white">
                                Apply
                            </button>

                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!--=====================================
                                    ADPOST PART END
                        =======================================-->

    @include('includes.footer')
@endsection

