@extends('layouts.layout')
@section('content')
    @include('includes.header')
    @include('includes.sidebar')

    <!--=====================================
                      SINGLE BANNER PART START
            =======================================-->
    <section class="single-banner dashboard-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>ad post</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                      SINGLE BANNER PART END
            =======================================-->



    <section class="adpost-part mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form action="#">
                        <fieldset>
                            <div class="section postdetails">
                                <h3 class="mb-4">
                                    Sell an item or service
                                    <span class="pull-right float-end text-warning fs-5">* Mandatory Fields</span>
                                </h3>
                                <hr>

                                <div class="row form-group">
                                    <label class="col-sm-3">Type of ad<span class="required">*</span></label>
                                    <div class="col-sm-9 user-type">
                                        <input type="radio" name="sellType" value="newsell" id="newsell" />
                                        <label for="newsell">I want to sell </label>
                                        <input type="radio" name="sellType" value="newbuy" id="newbuy" />
                                        <label for="newbuy">want to buy</label>
                                    </div>
                                </div>
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Category<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option value="1">Fashion & Beauty</option>
                                            <option value="2">Jobs</option>
                                            <option value="3">Electronics & Gadgets</option>
                                            <option value="4">Real Estate</option>
                                            <option value="5">Sports & Games</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Title for your Ad<span
                                            class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="text"
                                            placeholder="ex, Sony Xperia dual sim 100% brand new " />
                                    </div>
                                </div>
                                <div class="row form-group add-image">
                                    <label class="col-sm-3 label-title">Photos for your ad
                                        <span>( Cover Photo )</span>
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

                                                <input type="file" id="images" name="images[]" multiple
                                                    accept="image/*" hidden>
                                            </label>

                                            <div id="preview-container" class="preview-container"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group select-condition">
                                    <label class="col-sm-3">Condition<span class="required">*</span></label>
                                    <div class="col-sm-9 checkblack">
                                        <input type="radio" name="itemCon" value="new" id="new" />
                                        <label for="new">New</label>
                                        <input type="radio" name="itemCon" value="used" id="used" />
                                        <label for="used">Used</label>
                                    </div>
                                </div>
                                <div class="row form-group select-price">
                                    <label class="col-sm-3 label-title">Price<span class="required">*</span></label>
                                    <div class="col-sm-9 checkblack">
                                        <label>AED</label>
                                        <input type="text" class="form-control" id="text1" />
                                        <input type="radio" name="price" value="negotiable" id="negotiable" />
                                        <label for="negotiable">Negotiable </label>
                                    </div>
                                </div>
                                <div class="row form-group brand-name">
                                    <label class="col-sm-3 label-title">Brand Name<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="ex, Sony Xperia" />
                                    </div>
                                </div>
                                <div class="row form-group additional">
                                    <label class="col-sm-3 label-title">Additional<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="checkbox checkblack">
                                            <label for="camera"><input type="checkbox" name="camera" id="camera" />
                                                Camera</label>
                                            <label for="dual-sim"><input type="checkbox" name="dual-sim"
                                                    id="dual-sim" />
                                                Dual SIM</label>
                                            <label for="keyboard"><input type="checkbox" name="keyboard"
                                                    id="keyboard" />
                                                Physical keyboard</label>
                                            <label for="3g"><input type="checkbox" name="3g"
                                                    id="3g" />
                                                3G</label>
                                            <label for="gsm"><input type="checkbox" name="gsm"
                                                    id="gsm" />
                                                GSM</label>
                                            <label for="screen"><input type="checkbox" name="screen"
                                                    id="screen" />
                                                Touch screen</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group model-name">
                                    <label class="col-sm-3 label-title">Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="model"
                                            placeholder="ex, Sony Xperia dual sim 100% brand new " />
                                    </div>
                                </div>

                                <div class="row form-group item-description">
                                    <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="textarea" placeholder="Write few lines about your products" rows="8"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 offset-sm-3">
                                        <p>5000 characters left</p>
                                    </div>
                                </div>
                            </div>
                            <!-- section -->

                            <div class="section seller-info mt-5 mb-5">
                                <h4>Seller Information</h4>
                                <hr>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Condition<span class="required">*</span></label>
                                    <div class="col-sm-9 checkblack">
                                        <input type="radio" name="sellerType" value="individual" id="individual" />
                                        <label for="individual">Individual</label>
                                        <input type="radio" name="sellerType" value="dealer" id="dealer" />
                                        <label for="dealer">Dealer</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Your Name<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="ex, Jhon Doe" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Your Email ID<span
                                            class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="ex, jhondoe@mail.com" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Mobile Number<span
                                            class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mobileNumber" class="form-control"
                                            placeholder="ex, +912457895" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control"
                                            placeholder="ex, alekdera House, coprotec, usa" />
                                    </div>
                                </div>
                            </div>




                            <button type="submit"
                                class="btn btn-outline-warning ithaan-post-btn mb-5 text-dark bg-white">
                                Post Your Ad
                            </button>

                            <!-- section -->
                        </fieldset>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Quick rules</h3>
                            <button data-bs-dismiss="alert">close</button>
                        </div>
                        <ul class="account-card-text">
                            <li>
                                <p>Make sure you post in the correct category.</p>
                            </li>
                            <li>
                                <p>Do not post the same ad more than once or repost an ad within 48 hours.</p>
                            </li>
                            <li>
                                <p>Do not upload pictures with watermarks.</p>
                            </li>
                            <li>
                                <p>Do not post ads containing multiple items unless it's a package deal.</p>
                            </li>
                            <li>
                                <p>Do not put your email or phone numbers in the title or description.</p>
                            </li>
                            <li>
                                <p>Make sure you post in the correct category.</p>
                            </li>
                            <li>
                                <p>Do not post the same ad more than once or repost an ad within 48 hours.</p>
                            </li>
                            <li>
                                <p>Do not upload pictures with watermarks.</p>
                            </li>
                            <li>
                                <p>Do not post ads containing multiple items unless it's a package deal.</p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                        ADPOST PART END
            =======================================-->


    @include('includes.footer')
@endsection
