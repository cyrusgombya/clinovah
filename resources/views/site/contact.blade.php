@extends('layouts.site')

@section('title', 'Home - Clinic')
@section('body_class', 'index-page')

@section('content')
 <div class="breadcrumb-section">
      <div class="img-overlay">
        <div class="custom-container container">
          <div class="row g-0">
            <div class="col-12">
              <div class="page-title">
                <h3>Contact</h3>
              </div>
            </div>
            <div class="col-12">
              <div class="icon-breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="index.html">
                      <svg>
                        <use xlink:href="{{ asset('assets/clin/svg/home1.svg#home') }}"></use>
                      </svg></a></li>
                  <li class="breadcrumb-item active">Contact</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section>
      <div class="custom-container container">
        <div class="contact-main"> 
          <div class="row gy-3">
            <div class="col-12">
              <h6>Let's Get In Touch</h6>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="address-items"> 
                <div class="icon-box"> <i class="ri-map-pin-line"></i></div>
                <div class="contact-box"> 
                  <h6>Contact Number</h6>
                  <p>(+256) 200 - 948 - 068</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="address-items"> 
                <div class="icon-box"> <i class="ri-phone-line"></i></div>
                <div class="contact-box"> 
                  <h6>Email Address</h6>
                  <p>contact@clinovah.com</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="address-items"> 
                <div class="icon-box"> <i class="ri-mail-send-line"></i></div>
                <div class="contact-box"> 
                  <h6>Other Address</h6>
                  <p>Galuleeba  Plaza, Wakiso Town, S26 Uganda</p>
                </div>
              </div>
            </div>
           
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-b-space pt-0"> 
      <div class="custom-container container">
        <div class="contact-main"> 
          <div class="row align-items-center gy-4">
            <div class="col-xl-5 col-lg-6">
              <div class="contact-img"> <img class="img-fluid" src="{{ asset('assets/clin/images/others/contact1.png') }}" alt="contact1"></div>
            </div> 
            <div class="col-lg-6 offset-xl-1">
              <div class="contact-box"> 
                <h4>Contact Us </h4>
                <p>If you've got fantastic products or want to collaborate, reach out to us. </p>
                <div class="contact-form">  
                  <div class="row gy-md-4 gy-3">
                    <div class="col-12"> 
                      <label class="form-label" for="inputEmail4">Full Name </label>
                      <input id="inputEmail4" type="text" name="text" placeholder="Enter Full Name">
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label" for="inputEmail5">Email Address</label>
                      <input id="inputEmail5" type="email" name="email" placeholder="Enter Email Address">
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label" for="inputEmail6">Phone Number</label>
                      <input id="inputEmail6" type="number" name="number" placeholder="Enter Phone Number">
                    </div>
                    <div class="col-12"> 
                      <label class="form-label" for="inputEmail7">Services</label>
                      <input id="inputEmail7" type="text" name="text" placeholder="Enter Services">
                    </div>
                    <div class="col-12"> 
                      <label class="form-label">Message</label>
                      <textarea id="message" rows="6" placeholder="Enter Your Message"></textarea>
                    </div>
                    <div class="col-12"> 
                      <button class="btn btn-md sub-btn" type="submit"> Send Message </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
