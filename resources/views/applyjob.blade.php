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
                    <form action="#">
                        <fieldset>
                            <div class="section postdetails">
                                <h3 class="mb-4">
                                    Employee Details
                                    <span class="pull-right float-end text-danger fs-6">*Mandatory Fields</span>
                                </h3>
                                <hr>


                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Name<span class="required"></span></label>
                                    <div class="col-sm-9 greeny">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Enter your name " />
                                    </div>
                                </div>

                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Email<span class="required"></span></label>
                                    <div class="col-sm-9 greeny">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Enter your email " />
                                    </div>
                                </div>

                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Phone Number<span class="required"></span></label>
                                    <div class="col-sm-9 greeny">
                                        <input type="text" class="form-control" id="phone"
                                            placeholder="Enter your number " />
                                    </div>
                                </div>

                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">What type of jobs it?<span
                                            class="required"></span></label>
                                    <div class="col-sm-9 greeny">
                                        <select class="form-control">
                                            <option value="1">Full-time</option>
                                            <option value="2">Part-time</option>
                                            <option value="3">Temporary</option>
                                            <option value="4">Contract</option>
                                            <option value="5">Internship</option>
                                            <option value="6">Commision only</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row form-group add-image">
                                    <label class="col-sm-3 label-title">
                                        <span>Upload Resume</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="upload-wrapper">

                                            <label for="images" class="upload-box">
                                                <i class="fa fa-cloud-upload upload-icon"></i>

                                                <h5>Drag & Drop Images Here</h5>

                                                <p>
                                                    or <span>Browse Files</span>
                                                </p>

                                                <small>
                                                    JPG, PNG, WEBP • Max 5 Images
                                                </small>

                                                <input type="file" id="images" name="files[]" multiple
                                                    accept="image/*,.pdf,application/pdf" hidden>
                                            </label>

                                            <div id="preview-container" class="preview-container"></div>

                                        </div>
                                    </div>
                                </div>


                            </div>





                            <button type="submit"
                                class="btn btn-outline-warning ithaan-post-btn mt-2 mb-5 text-dark bg-white">
                                Apply
                            </button>

                            <!-- section -->
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
