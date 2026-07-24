@extends('layouts.layout')
@section('content')
    {{-- @include('includes.header')
    @include('includes.sidebar') --}}
    <!--=====================================
                                                USER-FORM PART START
                                    =======================================-->
    <section class="user-form-part">
        <div class="user-form-banner">
            <div class="user-form-content">
                <a href="{{ route('home') }}"><img src="/storage/images/logo.png" alt="logo"></a>
                <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
                <p>Biggest Online Advertising Marketplace in the World.</p>
            </div>
        </div>

        <div class="user-form-category">
            <div class="user-form-header">
                <a href="{{ route('home') }}"><img src="/storage/images/logo.png" alt="logo"></a>
                <a href='{{ route('home') }}'><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="user-form-category-btn">
                <ul class="nav nav-tabs">
                    <li><a href="#login-tab" class="nav-link active" data-bs-toggle="tab">sign in</a></li>
                    <li><a href="#register-tab" class="nav-link" data-bs-toggle="tab">sign up</a></li>
                </ul>
            </div>

            <div class="tab-pane active" id="login-tab">
                <div class="user-form-title">
                    <h2>Welcome!</h2>
                    <p>Use credentials to access your account.</p>
                </div>
                <form>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone number">
                                <small class="form-alert">Please follow this example - +971 00 000 0000</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="password" class="form-control" id="pass" placeholder="Password">
                                <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <small class="form-alert">Password must be 6 Characters</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="signin-check">
                                    <label class="custom-control-label" for="signin-check">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-6">
                                                            <div class="form-group text-right">
                                                                <a href="#" class="form-forgot">Forgot password?</a>
                                                            </div>
                                                        </div> -->
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-inline">
                                    <i class="fas fa-unlock"></i>
                                    <span>Enter your account</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="user-form-direction">
                    <p>Don't have an account? click on the <span>( sign up )</span> button above.</p>
                </div>
            </div>

            <div class="tab-pane" id="register-tab">
                <div class="user-form-title">
                    <h2>Register</h2>
                    <p>Setup a new account in a minute.</p>
                </div>

                <form>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                                <small class="form-alert">Please follow this example - John Doe</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone number">
                                <small class="form-alert">Please follow this example - 01XXXXXXXXX</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control">
                                    {{-- <option value="" selected disabled>Select Company</option> --}}
                                    <option value="private-company">Private Company</option>
                                    <option value="self-employed">Self-Employed</option>
                                </select>
                                <small class="form-alert">
                                    Select your company or employment type.
                                </small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control" id="category">
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="properties">Properties</option>
                                    <option value="cars">Cars</option>
                                    <option value="jobs">Jobs</option>
                                    <option value="classifieds">Classifieds</option>
                                    <option value="other">+ Add New Category</option>
                                </select>

                                <input type="text" class="form-control mt-2" id="newCategory"
                                    placeholder="Enter new category" style="display: none;">

                                <small class="form-alert">
                                    Please select your business category or add a new one.
                                </small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email 1">
                                <small class="form-alert">Please follow this example - john.doe@example.com</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email 2 (Optional)">
                                <small class="form-alert">Please follow this example - john.doe@example.com</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password">
                                <button class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <small class="form-alert">Use a strong password.</small>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Repeat Password">
                                <button class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <small class="form-alert">Password must be 6 characters</small>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="signup-check">
                                    <label class="custom-control-label" for="signup-check">I agree to the all <a
                                            href="#">terms & consitions</a> of bebostha.</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-inline">
                                    <i class="fas fa-user-check"></i>
                                    <span>Create new account</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="user-form-direction">
                    <p>Already have an account? click on the <span>( sign in )</span> button above.</p>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                USER-FORM PART END
            =======================================-->

    <script>
        document.getElementById('category').addEventListener('change', function() {
            const newCategory = document.getElementById('newCategory');

            if (this.value === 'other') {
                newCategory.style.display = 'block';
                newCategory.required = true;
            } else {
                newCategory.style.display = 'none';
                newCategory.required = false;
                newCategory.value = '';
            }
        });
    </script>


    {{-- @include('includes.footer') --}}
@endsection
