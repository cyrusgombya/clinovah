@extends('layouts.site')

@section('title', 'PHYSIC - Premium Doctor Template')
@section('meta_description', 'PHYSIC')
@section('meta_keywords', 'PHYSIC')

@section('content')
    <div class="loader-wrapper">
      <div class="text-center"><img class="img-fluid" src="{{ asset('assets/clin/images/Loader.gif') }}" alt="loader"></div>
      <div class="text-animation">
        <svg>
          <text x="50%" y="50%" dy=".35em" text-anchor="middle">Clinovah</text>
        </svg>
      </div>
    </div>
    <section class="p-0 home-section style-2">
      <div class="custom-container container">
        <div class="home-bg-img">
          <div class="row align-items-center">
            <div class="col-lg-7"> 
              <div class="heading-title">Better
                <ul> 
                  <li> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/home/1.jpg') }}" alt="home-1"></li>
                  <li> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/home/2.jpg') }}" alt="home-2"></li>
                  <li> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/home/3.jpg') }}" alt="home-3"></li>
                </ul>Care Begins With The Right Connection<img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/home/4.jpg') }}" alt="home-4">
              </div>
              <p>Every health journey is unique, and finding the right expert shouldn’t be complicated. Discover verified specialists, explore services, and schedule visits in just a few clicks. Quality care is now within reach.</p><a class="btn btn-lg sec-btn-right" href="{{ route('clinics.index') }}">
                 Discover<span> <i class="fa-solid fa-arrow-right"> </i></span></a>
              <div class="row"> 
                <div class="col-md-7 col-10">
                  <div class="dental-slider-box">
                    <div class="swiper-pagination dental-pagination"></div>
                    <div class="swiper dental-slider"> 
                      <div class="swiper-wrapper">
                        <div class="swiper-slide"><a href="element_book-appointment.html"> <img class="img-fluid rounded" src="{{ asset('assets/clin/images/sli-1.jpg') }}" alt="slider"></a></div>
                        <div class="swiper-slide"> <a href="element_book-appointment.html"> <img class="img-fluid rounded" src="{{ asset('assets/clin/images/sli-2.jpg') }}" alt="slider-1"></a></div>
                        <div class="swiper-slide"> <a href="element_book-appointment.html"> <img class="img-fluid rounded" src="{{ asset('assets/clin/images/sli-3.jpg') }}" alt="slider-3"></a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5"> 
              <div class="eye-img"> <img class="img-fluid" src="{{ asset('assets/clin/images/doc.webp') }}" alt="other">
                <div class="eye-box">
                  <div class="box-1"> 
                    <div class="content-box"> 
                      <div class="bg-color"> <span>Available Doctor</span>
                        <ul> 
                          <li> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-6/3.png') }}" alt="other">
                            <div>  
                              <h6>Ralph Edwards</h6>
                              <p>Tajikistan</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="box-2"> 
                    <div class="content-box"> 
                      <div class="bg-color"> <span>Available Doctor</span>
                        <ul> 
                          <li> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-6/3.png') }}" alt="other">
                            <div>  
                              <h6>Ralph Edwards</h6>
                              <p>Tajikistan</p>
                            </div>
                          </li>
                          <li> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-6/4.png') }}" alt="other">
                            <div> 
                              <h6>Dianne Russell</h6>
                              <p>South Africa</p>
                            </div>
                          </li>
                        </ul>
                        <button class="btn">Book Appointment</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <section class="featured-hospitals">
    <div class="custom-container container">
        <div class="row">
            <div class="col-12">
                <div class="title-2">
                   
                    <h2>Top Healthcare Facilities</h2>
                </div>
            </div>
        </div>
        <div class="row gy-4">
            <!-- Hospital 1: Tashkent Medical Park -->
            <div class="col-lg-4 col-md-6">
                <div class="hospital-list">
                    <div class="d-flex">
                        <div class="hospital-logo">
                            <img class="img-fluid" src="../assets/images/others/dummy-logo/1.png" alt="hospital-icon">
                        </div>
                        <div class="hospital-content">
                            <h6>Micheals Dental</h6>
                            <ul class="rating">
                                <li><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i></li>
                                <li>23 reviews</li>
                            </ul>
                        </div>
                    </div>
                    <ul class="address-box">
                        <li><i class="ri-time-line"></i>Mon – Sat: 09:00 to 20:00</li>
                        <li><i class="ri-question-line"></i>Nansana</li>
                    </ul>
                    <div class="button-group">
                        <a class="btn btn-fill" href="{{ route('clinics.index') }}">More Details</a>
                        <a class="btn btn-outline" href="{{ route('clinics.index') }}"><i class="ri-send-plane-line"></i></a>
                        <a class="btn btn-outline" href="{{ route('clinics.index') }}"><i class="ri-phone-line"></i></a>
                    </div>
                </div>
            </div>

            <!-- Hospital 2: CityCare Children's Hospital -->
            <div class="col-lg-4 col-md-6">
                <div class="hospital-list">
                    <div class="d-flex">
                        <div class="hospital-logo">
                            <img class="img-fluid" src="../assets/images/others/dummy-logo/2.png" alt="hospital-icon">
                        </div>
                        <div class="hospital-content">
                            <h6>CityCare Children's Hospital</h6>
                            <ul class="rating">
                                <li><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i></li>
                                <li>45 reviews</li>
                            </ul>
                        </div>
                    </div>
                    <ul class="address-box">
                        <li><i class="ri-time-line"></i>Everyday: 08:00 to 21:00</li>
                        <li><i class="ri-question-line"></i>Kololo</li>
                    </ul>
                    <div class="button-group">
                        <a class="btn btn-fill" href="{{ route('clinics.index') }}">More Details</a>
                        <a class="btn btn-outline" href="{{ route('clinics.index') }}"><i class="ri-send-plane-line"></i></a>
                        <a class="btn btn-outline" href="{{ route('clinics.index') }}"><i class="ri-phone-line"></i></a>
                    </div>
                </div>
            </div>

            <!-- Hospital 3: HeartPlus Cardiology Center -->
            <div class="col-lg-4 col-md-6">
                <div class="hospital-list">
                    <div class="d-flex">
                        <div class="hospital-logo">
                            <img class="img-fluid" src="../assets/images/others/dummy-logo/4.png" alt="hospital-icon">
                        </div>
                        <div class="hospital-content">
                            <h6>Nalongos General Hospital</h6>
                            <ul class="rating">
                                <li><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i></li>
                                <li>58 reviews</li>
                            </ul>
                        </div>
                    </div>
                    <ul class="address-box">
                        <li><i class="ri-time-line"></i>Mon – Sat: 09:00 to 20:00</li>
                        <li><i class="ri-question-line"></i>Masaka</li>
                    </ul>
                    <div class="button-group">
                        <a class="btn btn-fill" href="{{ route('clinics.index') }}">More Details</a>
                        <a class="btn btn-outline" href="{{ route('clinics.index') }}"><i class="ri-send-plane-line"></i></a>
                        <a class="btn btn-outline" href="{{ route('clinics.index') }}"><i class="ri-phone-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <div class="marquee">
          <div class="marquee__item">
            <h4 class="animation-text">Dental Care</h4>
          </div>
          <div class="marquee__item">
            <h4 class="animation-text">Heart Care</h4>
          </div>
          <div class="marquee__item">
            <h4 class="animation-text">Dental Care</h4>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="custom-container container">
        <div class="row g-xl-5 gy-4">
          <div class="col-xl-4 col-md-6"> 
            <div class="service-details"> 
              <div class="service-img"> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/service/1.png') }}" alt="service-1"></div>
              <div class="service-content"> <a href="service-2.html">
                  <h4>Dental Care </h4></a>
                <p>Dental Care that will make your smile shine from ear to ear. With trusted verified profesionals </p><a class="btn btn-md sub-btn" href="service-2.html">Learn more </a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6"> 
            <div class="service-details"> 
              <div class="label-img"><img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/service/shape.png') }}" alt="shape"><span>New</span></div>
              <div class="service-img"> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/service/2.png') }}" alt="service-2"></div>
              <div class="service-content"><a href="service-2.html"> 
                  <h4>Pediatric Care</h4></a>
                <p>Pediatric care focuses on the health and well-being of children from birth through adolescence, ensuring proper growth, development, and disease prevention.</p><a class="btn btn-md sub-btn" href="service-2.html">Learn more </a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="service-details"> 
              <div class="service-img"> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/service/3.png') }}" alt="service-3"></div>
              <div class="service-content"> <a href="service-2.html">
                  <h4>Heart Clinicis</h4></a>
                <p>A Pick from our heart specialists to keep that jog running with a healthy heart.</p><a class="btn btn-md sub-btn" href="service-2.html">Learn more </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="about-us-section light-section"> 
      <div class="custom-container container">
        <div class="title">
          <div class="dot-img"><span>Help</span><img class="img-fluid" src="{{ asset('assets/clin/images/title/title2.png') }}" alt="title2"></div>
          <h2>How It Works</h2>
        </div>
        <div class="row"> 
          <div class="col-lg-6 p-sm-0 col-12">
            <div class="image-container">
              <div class="ba-slider">
                <div><img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/abouts/2.jpg') }}" alt="images">
                  <div class="resize"></div>
                </div><span class="handle"><i class="ri-expand-left-right-line"></i></span>
              </div>
              <div class="back-div"></div>
            </div>
          </div>
          <div class="col-lg-6 p-sm-0 col-12">
            <div class="about-us-details">
              <div class="d-flex align-items-center gap-3">
               
              </div><a href="about-us.html">
                <h4>Specialised Care at Your Fingertips, Dont stand in line  </h4></a>
              <p>Accessing specialized healthcare is simple and convenient. Search for the care you need and explore trusted clinics and professionals available on the platform. Choose a provider that suits you, pick a convenient date and time, and book your appointment in just a few steps.</p>
              <div class="d-flex align-items-center gap-3"><a class="btn btn-md sub-btn" href="{{ route('site.about') }}">Read more</a><a class="btn btn-md sub-btn-2" href="{{ route('clinics.index') }}">Explore Clinics</a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
    <section class="light-section"> 
      <div class="custom-container container">
        <div class="title">
          <div class="dot-img"><span>Our</span><img class="img-fluid" src="{{ asset('assets/clin/images/title/title2.png') }}" alt="title2"></div>
          <h2>Top Doctors</h2>
        </div>
        <div class="team-slider-box">
          <div class="swiper doctor-team about-us-section"> 
            <div class="swiper-wrapper">
              <div class="swiper-slide"> 
                <div class="doctor-team-box"> 
                  <div class="img"> <img src="{{ asset('assets/clin/images/doctor/doctor_1.jpg') }}" alt="doctor_1"></div>
                  <div class="doctor-details">
                    <div class="d-flex align-items-center gap-3">
                      <p>Dental Specialist</p>
                      <div class="icon"> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/abouts/broken-tooth.png') }}" alt="broken-tooth"></div>
                    </div><a href="doctors-list.html"> 
                      <h5>Advanced Equipment Best Dentists in ...</h5></a><span class="m-0">Spending 5 years with Clinovah Dr. Gombya has a satisfaction rate that rivals a lot and you can book him on our platform</span>
                  </div>
                  <div class="doctor-name">   
                    <p>Dr. Gombya</p><i class="ri-add-fill"></i>
                  </div>
                </div>
              </div>
              <div class="swiper-slide"> 
                <div class="doctor-team-box"> 
                  <div class="img"> <img src="{{ asset('assets/clin/images/doctor/doctor_2.jpg') }}" alt="doctor_2"></div>
                  <div class="doctor-details">
                    <div class="d-flex align-items-center gap-3">
                      <p>Nutritionist</p>
                      <div class="icon"> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/abouts/broken-tooth.png') }}" alt="broken-tooth"></div>
                    </div><a href="doctors-list.html">
                      <h5>Treating Through Food</h5></a><span class="m-0">Any Gut problems and eating problems we have specialists for you in every run and walk of your health journey.</span>
                  </div>
                  <div class="doctor-name">   
                    <p>Dr. Annet</p><i class="ri-add-fill"></i>
                  </div>
                </div>
              </div>
              <div class="swiper-slide"> 
                <div class="doctor-team-box"> 
                  <div class="img"> <img src="{{ asset('assets/clin/images/doctor/doctor_1.jpg') }}" alt="doctor_1"></div>
                  <div class="doctor-details">
                    <div class="d-flex align-items-center gap-3">
                      <p>Dental Specialist</p>
                      <div class="icon"> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/abouts/broken-tooth.png') }}" alt="broken-tooth"></div>
                    </div><a href="doctors-list.html">
                      <h5>Exploring Effective Alternatives to Surgery</h5></a><span class="m-0">Non-surgical interventions encompass a range of treatments like medication management, lifestyle modifications, physical therapy, and minimally invasive procedures, offering effective alternatives to surgical options for various medical conditions.</span>
                  </div>
                  <div class="doctor-name">   
                    <p>Dr. Marchel</p><i class="ri-add-fill"></i>
                  </div>
                </div>
              </div>
              <div class="swiper-slide"> 
                <div class="doctor-team-box"> 
                  <div class="img"> <img src="{{ asset('assets/clin/images/doctor/doctor_2.jpg') }}" alt="doctor_2"></div>
                  <div class="doctor-details">
                    <div class="d-flex align-items-center gap-3">
                      <p>Dental Specialist</p>
                      <div class="icon"> <img class="img-fluid" src="{{ asset('assets/clin/images/layout-2/abouts/broken-tooth.png') }}" alt="broken-tooth"></div>
                    </div><a href="doctors-list.html">
                      <h5>Importance of Heart Health</h5></a><span class="m-0">Understanding the importance of heart health is crucial for longevity. Regular exercise, a balanced diet, and managing stress can significantly reduce the risk of heart disease and promote overall well-being.</span>
                  </div>
                  <div class="doctor-name">   
                    <p>Dr. Marchel</p><i class="ri-add-fill"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-flex-2">
            <div class="swiper-button-prev team-button-prev"></div>
            <div class="swiper-button-next team-button-next"></div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="custom-container container"> 
        <div class="title">
         
          <h2>Our Clinics  </h2>
        </div>
        <div class="row gy-4 gx-4 animated-thumbnails-gallery">
          <div class="col-xl-3 col-md-4 col-sm-6"> 
            <div class="surgery-box lg-item" data-src="{{ asset('assets/clin/images/layout-2/surgery/1.jpg') }}"> <img class="img-fluid w-100" src="{{ asset('assets/clin/images/layout-2/surgery/1.jpg') }}" alt="surgery-1">
              <div class="surgery-details"><a href="sortable-list.html">Surgery</a><i class="ri-add-fill"> </i></div>
            </div>
          </div>
          <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="surgery-box lg-item" data-src="{{ asset('assets/clin/images/layout-2/surgery/2.jpg') }}"> <img class="img-fluid w-100" src="{{ asset('assets/clin/images/layout-2/surgery/2.jpg') }}" alt="surgery-2">
              <div class="surgery-details"> <a href="sortable-list.html">Surgery</a><i class="ri-add-fill"></i></div>
            </div>
          </div>
          <div class="col-xl-3 col-md-4 col-sm-6"> 
            <div class="surgery-box lg-item" data-src="{{ asset('assets/clin/images/layout-2/surgery/3.jpg') }}"> <img class="img-fluid w-100" src="{{ asset('assets/clin/images/layout-2/surgery/3.jpg') }}" alt="surgery-3">
              <div class="surgery-details"> <a href="sortable-list.html">Surgery</a><i class="ri-add-fill"></i></div>
            </div>
          </div>
          <div class="col-xl-3 col-md-4 col-sm-6"> 
            <div class="surgery-box lg-item" data-src="{{ asset('assets/clin/images/layout-2/surgery/4.jpg') }}"> <img class="img-fluid w-100" src="{{ asset('assets/clin/images/layout-2/surgery/4.jpg') }}" alt="surgery-4">
              <div class="surgery-details"> <a href="sortable-list.html">Surgery</a><i class="ri-add-fill"></i></div>
            </div>
          </div>
          <div class="col-xl-3 col-md-4 col-sm-6"> 
            <div class="surgery-box lg-item" data-src="{{ asset('assets/clin/images/layout-2/surgery/5.jpg') }}"> <img class="img-fluid w-100" src="{{ asset('assets/clin/images/layout-2/surgery/5.jpg') }}" alt="surgery-5">
              <div class="surgery-details"> <a href="sortable-list.html">Surgery</a><i class="ri-add-fill"></i></div>
            </div>
          </div>
          <div class="col-xl-3 col-md-4 col-sm-6"> 
            <div class="surgery-box lg-item" data-src="{{ asset('assets/clin/images/layout-2/surgery/6.jpg') }}"> <img class="img-fluid w-100" src="{{ asset('assets/clin/images/layout-2/surgery/6.jpg') }}" alt="surgery-6">
              <div class="surgery-details"> <a href="sortable-list.html">Surgery</a><i class="ri-add-fill"></i></div>
            </div>
          </div>
          <div class="col-xl-3 col-md-4 col-sm-6"> 
            <div class="surgery-box lg-item" data-src="{{ asset('assets/clin/images/layout-2/surgery/7.jpg') }}"> <img class="img-fluid w-100" src="{{ asset('assets/clin/images/layout-2/surgery/7.jpg') }}" alt="surgery-7">
              <div class="surgery-details"> <a href="sortable-list.html">Surgery</a><i class="ri-add-fill"></i></div>
            </div>
          </div>
          <div class="col-xl-3 col-md-4 col-sm-6"> 
            <div class="surgery-box lg-item" data-src="{{ asset('assets/clin/images/layout-2/surgery/8.jpg') }}"> <img class="img-fluid w-100" src="{{ asset('assets/clin/images/layout-2/surgery/8.jpg') }}" alt="surgery-8">
              <div class="surgery-details"> <a href="sortable-list.html">Surgery </a><i class="ri-add-fill"></i></div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
    <section class="light-section"> 
      <div class="custom-container container"> 
        <div class="swiper bran-logo">
          <div class="swiper-wrapper">
            <div class="swiper-slide text-center"> <a href="#"><img class="img-fluid" src="{{ asset('assets/clin/images/brand-logo/1.png') }}" alt="brand-logo"></a></div>
            <div class="swiper-slide text-center"> <a href="#"><img class="img-fluid" src="{{ asset('assets/clin/images/brand-logo/2.png') }}" alt="brand-logo"></a></div>
            <div class="swiper-slide text-center"> <a href="#"><img class="img-fluid" src="{{ asset('assets/clin/images/brand-logo/3.png') }}" alt="brand-logo"></a></div>
            <div class="swiper-slide text-center"> <a href="#"><img class="img-fluid" src="{{ asset('assets/clin/images/brand-logo/4.png') }}" alt="brand-logo"></a></div>
            <div class="swiper-slide text-center"> <a href="#"><img class="img-fluid" src="{{ asset('assets/clin/images/brand-logo/3.png') }}" alt="brand-logo"></a></div>
          </div>
        </div>
      </div>
    </section>
@endsection