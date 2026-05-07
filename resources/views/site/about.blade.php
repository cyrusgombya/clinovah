@extends('layouts.site')

@section('title', 'About - Clinic')
@section('body_class', 'about-page')

@section('content')
<!-- Breadcrumb Section -->
<div class="breadcrumb-section">
  <div class="img-overlay">
    <div class="custom-container container">
      <div class="row g-0">
        <div class="col-12">
          <div class="page-title">
            <h3>About Us</h3>
          </div>
        </div>
        <div class="col-12">
          <div class="icon-breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.html">
                  <svg>
                    <use xlink:href="{{ asset('assets/clin/svg/home1.svg#home') }}"></use>
                  </svg></a></li>
              <li class="breadcrumb-item active">About Us</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- About Section 1: Intro & Stats -->
<section> 
  <div class="custom-container container"> 
    <div class="row gy-4">
      <div class="col-lg-6 p-0">
        <div class="about-info">
          <img class="img-fluid w-100 about-info-img-1" src="{{ asset('assets/clin/images/about/about.png') }}" alt="about-1">
          <img class="img-fluid w-100 about-info-img img-fluid" src="{{ asset('assets/clin/images/about/about.png') }}" alt="about-2">
          <div class="about-img-content">
            <h6>Dr. Esita Jabed</h6>
            <span>Staff proficient in English, Spanish, and French for comprehensive, multilingual content delivery.</span>
            <ul class="rating">
              <li><i class="fa-solid fa-star"></i></li>
              <li><i class="fa-solid fa-star"></i></li>
              <li><i class="fa-solid fa-star"></i></li>
              <li><i class="fa-solid fa-star"></i></li>
              <li><i class="fa-solid fa-star"></i></li>
            </ul>
            <a href="tel:+15874632189"> <i class="fa-solid fa-phone"></i>+158 854 596347</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="about-info-content">
         <p>Our platform is dedicated to connecting individuals with trusted specialized healthcare providers, making access to quality care simple and convenient. We focus on promoting well-being by helping people find the right professionals with ease, while upholding values of reliability, accessibility, and care. By streamlining the booking process, we empower individuals to take control of their health and support a stronger, healthier community.</p>
          <ul> 
            <li><a href="#"><i class="ri-heart-pulse-fill"></i>Healthcare Experts Network</a></li>
            <li><a href="#"><i class="ri-brain-fill"></i>Urgent Medical Assistance</a></li>
            <li><a href="#"><i class="ri-tooth-fill"></i>Essential Tools & Facilities</a></li>
            <li><a href="#"><i class="ri-capsule-fill"></i>Medical Strategy Advisors</a></li>
          </ul>
         
          <div class="doctor-img d-none d-lg-block">
            <div class="row align-items-center"> 
              <div class="col-5">
                <div class="img">
                  <img class="img-fluid" src="{{ asset('assets/clin/images/about/1.jpg') }}" alt="about-3">
                  <div class="play-icon">
                    <div class="icon-video"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#video"><i class="ri-play-large-fill"></i></a></div>
                  </div>
                </div>
              </div>
              <div class="col-7">
                <div class="content"> 
                  <p>Schedule appointments with ease, whether booking ahead or last-minute. We prioritize your health and well-being, offering flexibility to fit your busy lifestyle.</p>
                  <ul class="about-contact-wrap"> 
                    <li><p>Support Line 24/7</p><a href="#"> <i class="ri-mail-send-fill"></i> clinovah@healthcare.com</a></li>
                    <li><p>Schedule Online</p><a href="#"> <i class="ri-calendar-2-line"></i> Reserve Now</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Counter Section -->
<section class="pt-0">
  <div class="custom-container container"> 
    <div class="row">
      <div class="col-xxl-10 m-auto">
        <div class="row customer-wrap">
          <div class="col-lg-3 col-sm-6">
            <div class="customer-wrapper">
              <div class="customer-box">
                <h4><span class="counter-count">100</span>+</h4>
                <p class="f-light mb-0 mt-2">Expert Medical Professionals</p>
              </div>
              <img class="outline-box" src="{{ asset('assets/clin/images/others/box/1.svg') }}" alt="svg">
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="customer-wrapper">
              <div class="customer-box">
                <h4><span class="counter-count">2000</span>+</h4>
                <p class="f-light mb-0 mt-2">Patients Treated Annually</p>
              </div>
              <img class="outline-box" src="{{ asset('assets/clin/images/others/box/2.svg') }}" alt="svg">
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="customer-wrapper">
              <div class="customer-box">
                <h4><span class="counter-count">40</span>+</h4>
                <p class="f-light mb-0 mt-2">Partner Clinics Nationwide</p>
              </div>
              <img class="outline-box" src="{{ asset('assets/clin/images/others/box/3.svg') }}" alt="svg">
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="customer-wrapper">
              <div class="customer-box">
                <h4><span class="counter-count">28</span>+</h4>
                <p class="f-light mb-0 mt-2">Years of Experience</p>
              </div>
              <img class="outline-box" src="{{ asset('assets/clin/images/others/box/4.svg') }}" alt="svg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Services & Department Section -->
<section class="light-section"> 
  <div class="custom-container container"> 
    <div class="row gy-4"> 
      <div class="col-xl-6 col-lg-5">
        <div class="about-two-content custom-sticky">
          <span>Our Mission</span>
          <h3>Making Specialized Healthcare Easy to Access</h3>
          <p>We simplify the way people connect with specialized healthcare. Our platform brings together trusted clinics and professionals, helping you find the right care, book appointments effortlessly, and stay on track with your health journey, all in one place.</p>
          <a class="btn btn-lg sec-btn-right" href="clinics.html">Explore Clinics<span> <i class="fa-solid fa-arrow-right"></i></span></a>
        </div>
      </div>
      <div class="col-xl-6 col-lg-7"> 
        <div class="row gy-4">
          <div class="col-12">
            <div class="about-two-box">
              <div class="content">
                <div class="d-flex"> 
                  <div class="flex-grow-1"><span><span></span>Search</span><h4>Find the Right Specialist</h4></div>
                  <div class="flex-shrink-0"><img class="img-fluid" src="{{ asset('assets/clin/images/about/icon/1.svg') }}" alt="svg"></div>
                </div>
                <div class="text"><p>Browse a wide range of verified healthcare providers and explore specialized services tailored to your needs.</p></div>
              </div>
              <div class="img"><img class="img-fluid" src="{{ asset('assets/clin/images/about/3.jpg') }}" alt="svg"></div>
            </div>
          </div>
          <div class="col-12">
            <div class="about-two-box">
              <div class="content">
                <div class="d-flex"> 
                  <div class="flex-grow-1"><span><span></span>Book</span><h4>Schedule With Ease</h4></div>
                  <div class="flex-shrink-0"><img class="img-fluid" src="{{ asset('assets/clin/images/about/icon/2.svg') }}" alt="svg"></div>
                </div>
                <div class="text"><p>Select a convenient time and book your appointment in just a few steps, with or without creating an account.</p></div>
              </div>
              <div class="img"><img class="img-fluid" src="{{ asset('assets/clin/images/about/4.jpg') }}" alt="svg"></div>
            </div>
          </div>
          <div class="col-12">
            <div class="about-two-box">
              <div class="content">
                <div class="d-flex"> 
                  <div class="flex-grow-1"><span><span></span>Visit</span><h4>Get Care Confidently</h4></div>
                  <div class="flex-shrink-0"><img class="img-fluid" src="{{ asset('assets/clin/images/about/icon/4.svg') }}" alt="svg"></div>
                </div>
                <div class="text"><p>Attend your appointment and receive care directly from your chosen provider, with payments handled at the clinic.</p></div>
              </div>
              <div class="img"><img class="img-fluid" src="{{ asset('assets/clin/images/about/6.jpg') }}" alt="svg"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Doctor Team Carousel -->


<!-- Testimonials Section -->
<section class="light-section"> 
  <div class="custom-container container"> 
    <h3 class="text-center mb-4">Customer Testimonials</h3>
    <div class="swiper testimonial-2">
      <div class="swiper-wrapper">
        <div class="swiper-slide"> 
          <div class="testimonial-box-2"> 
            <ul class="rating"> 
              <li><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-line"></i><i class="ri-star-line"></i></li>
            </ul>
            <p>From start to finish, the care was exceptional—professional expertise, warm communication, and genuine compassion made every step of my journey stress-free, comfortable, and reassuring. Highly recommend to anyone seeking quality healthcare services.</p>
            <div class="d-flex"> 
              <div class="flex-grow-1">
                <h5>Dr.Esther Howard</h5>
                <p>Medical Assistant</p>
              </div>
              <div class="flex-shrink-0">
                <div class="quots"><span></span></div>
              </div>
            </div>
            <div class="img"><img class="img-fluid" src="{{ asset('assets/clin/images/about/team/7.jpg') }}" alt="team-7"></div>
          </div>
        </div>
        <div class="swiper-slide"> 
          <div class="testimonial-box-2"> 
            <ul class="rating"> 
              <li><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-line"></i><i class="ri-star-line"></i></li>
            </ul>
            <p>Their dedication and skill exceeded expectations. Each interaction was filled with kindness, patience, and clear guidance, ensuring I felt confident, supported, and valued throughout my treatment. Truly a remarkable healthcare experience, worth recommending to everyone.</p>
            <div class="d-flex"> 
              <div class="flex-grow-1">
                <h5>Dr.John Smith</h5>
                <p>Nursing Assistant</p>
              </div>
              <div class="flex-shrink-0">
                <div class="quots"><span></span></div>
              </div>
            </div>
            <div class="img"><img class="img-fluid" src="{{ asset('assets/clin/images/about/team/8.jpg') }}" alt="team-8"></div>
          </div>
        </div>
        <div class="swiper-slide"> 
          <div class="testimonial-box-2"> 
            <ul class="rating"> 
              <li><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-line"></i><i class="ri-star-line"></i></li>
            </ul>
            <p>Professional, attentive, and compassionate—every moment spent under their care reflected genuine concern for my wellbeing. Clear explanations and expert guidance made my healthcare journey seamless, reassuring, and positive from beginning to end.</p>
            <div class="d-flex"> 
              <div class="flex-grow-1">
                <h5>Dr.Sarah Johnson</h5>
                <p>Medical Assistant</p>
              </div>
              <div class="flex-shrink-0">
                <div class="quots"><span></span></div>
              </div>
            </div>
            <div class="img"><img class="img-fluid" src="{{ asset('assets/clin/images/about/team/9.jpg') }}" alt="team-9"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection