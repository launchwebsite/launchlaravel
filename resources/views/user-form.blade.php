@extends('layouts.layout')
@section('content')
    {{-- @include('includes.header')
    @include('includes.sidebar') --}}

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
                    <li><a href="#login-tab" class="nav-link {{ session('success') ? '' : 'active' }}"
                            data-bs-toggle="tab">sign in</a></li>
                    <li><a href="#register-tab" class="nav-link {{ session('success') ? 'active' : '' }}"
                            data-bs-toggle="tab">sign up</a></li>
                </ul>
            </div>

            <div class="tab-pane {{ session('success') ? '' : 'active' }}" id="login-tab">
                <div class="user-form-title">
                    <h2>Welcome!</h2>
                    <p>Use credentials to access your account.</p>
                </div>
                <form id="vendorLoginForm" method="POST" action="{{ route('login.submit') }}">
                    @csrf
                    @if ($errors->has('login_error'))
                        <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
                    @endif
                    <div class="row">
                        {{-- <div class="col-12">
                            <div class="form-group">
                                <input type="text" name="VR_Phone" id="VR_Phone" class="form-control"
                                    placeholder="Phone number">
                                <small class="form-alert">Please follow this example - +971 00 000 0000</small>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Enter Your Email"
                                    required autofocus>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <small class="form-alert">email must be 6 cprrect</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <small class="form-alert">Enter your password.</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="signin-check">
                                    <label class="custom-control-label" for="signin-check">Remember me</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-inline" id="loginBtn">
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

            <div class="tab-pane {{ session('success') ? 'active' : '' }}" id="register-tab">
                <div class="user-form-title">
                    <h2>Register</h2>
                    <p>Setup a new account in a minute.</p>
                </div>

                <form method="POST" action="{{ route('vendor.register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input name="VR_Name" type="text" class="form-control" placeholder="Name"
                                    value="{{ old('VR_Name') }}">
                                <small class="form-alert">Please follow this example - John Doe</small>
                                @error('VR_Name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input name="VR_Phone" type="text" class="form-control" placeholder="Phone number"
                                    value="{{ old('VR_Phone') }}">
                                <small class="form-alert">Please follow this example - 01XXXXXXXXX</small>
                                @error('VR_Phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select name="VR_Type" class="form-control">

                                    <option value="private-company"
                                        {{ old('VR_Type') == 'private-company' ? 'selected' : '' }}>Private Company
                                    </option>
                                    <option value="self-employed"
                                        {{ old('VR_Type') == 'self-employed' ? 'selected' : '' }}>Self-Employed</option>
                                </select>
                                <small class="form-alert">
                                    Select your company or employment type.
                                </small>
                                @error('VR_Type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input name="VR_Email_1" type="text" class="form-control" placeholder="Email 1"
                                    required value="{{ old('VR_Email_1') }}">
                                <small class="form-alert">Please follow this example - john.doe@example.com</small>
                                @error('VR_Email_1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input name="VR_Email_2" type="text" class="form-control"
                                    placeholder="Email 2 (Optional)" value="{{ old('VR_Email_2') }}">
                                <small class="form-alert">Please follow this example - john.doe@example.com</small>
                                @error('VR_Email_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input name="VR_Password" type="password" class="form-control" placeholder="Password">
                                <button class="form-icon"><i class="eye fas fa-eye"></i></button>
                                <small class="form-alert">Use a strong password.</small>
                                @error('VR_Password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            @if (session('success'))
                                <div class="alert alert-success d-flex align-items-center gap-2 mb-3"
                                    style="background:#0f2e1c;border:1px solid #1fae5a;color:#4ade80;border-radius:8px;padding:14px 18px;font-size:14px;">
                                    <i class="fas fa-check-circle"></i>
                                    <span>{{ session('success') }}</span>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger d-flex align-items-center gap-2 mb-3"
                                    style="background:#2e0f0f;border:1px solid #ae1f1f;color:#f87171;border-radius:8px;padding:14px 18px;font-size:14px;">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ session('error') }}</span>
                                </div>
                            @endif
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

    {{-- @include('includes.footer') --}}
@endsection
