@extends('layouts.layout')
@section('content')

    @include('includes.header')
    @include('includes.sidebar')

    <!--=====================================
                      SINGLE BANNER PART START
            =======================================-->
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>contact us</h2>
                        <!-- <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">contact</li>
                                </ol> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                      SINGLE BANNER PART END
            =======================================-->


    <!--=====================================
                        CONTACT PART START
            =======================================-->
    <section class="contact-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Find us</h3>
                        <p>Tower 2, Sheikh Zayed Road <span>Dubai, United Arab Emirates</span></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <i class="fas fa-phone-alt"></i>
                        <h3>Make a Call</h3>
                        <p>
                            +971 56 452 7879
                            <!-- <span>+971-4-215-5595</span> -->
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <h3>Send Mail</h3>
                        <p>hello@launchincs.com
                            <!-- <span>info@launchincs.com</span> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3435.6242337112712!2d55.2796218!3d25.2193915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f42f2c6b18a6d%3A0xf654601c16a47af8!2sKrisko%20%26%20Associates!5e1!3m2!1sen!2sin!4v1784010082659!5m2!1sen!2sin"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="contact-form" id="contactForm">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" id="name" class="form-control" placeholder="Your Name">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" placeholder="Your Email">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" id="subject" class="form-control" placeholder="Your Number">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea id="message" class="form-control" placeholder="Your Message"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-btn">
                                    <button type="submit" class="btn btn-inline">
                                        <i class="fas fa-paper-plane"></i>
                                        <span>Send Message</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                        CONTACT PART END
            =======================================-->

    @include('includes.footer')
@endsection

