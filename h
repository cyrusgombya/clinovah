<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'PHYSIC')">
    <meta name="keywords" content="@yield('meta_keywords', 'PHYSIC')">
    <meta name="author" content="pixelstrap">
    <title>@yield('title', 'PHYSIC - Premium Doctor Template')</title>
    <link rel="icon" href="{{ asset('assets/clin/images/fav-icon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;family=Roboto:ital,wght@0,100..900;1,100..900&amp;family=Russo+One&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clin/css/fontawesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clin/css/remixicon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clin/css/vendors/lg-thumbnail.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clin/css/vendors/lg-zoom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clin/css/vendors/lightgallery.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clin/css/vendors/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clin/css/vendors/toastify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clin/css/vendors/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clin/css/style.css') }}">
  </head>
  <body class="dental-care">
    <header>
      <div class="top-header top-header-two">
        <div class="custom-container container"> 
          <div class="header-items">
            <div class="top-header-left"><a href="tel:+256 200 948068"><i class="fa fa-phone"></i> +256 200 948068</a><a href="#"><i class="fa-regular fa-clock"></i>We Are Open 24 Hours</a></div>
            <div class="top-header-right"><a href="contact.html">
                 How to Find Us</a><a href="#" data-bs-toggle="modal" data-bs-target="#feedback">Give Feedback</a>
          </div>
        </div>
      </div>
      <div class="main-header main-header-two">
        <div class="custom-container container">
          <div class="row"> 
            <div class="col-12"> 
              <div class="mobile-fix-option"> 
                <ul> 
                  <li> <a href="index.html">
                      <svg>
                        <use xlink:href="{{ asset('assets/clin/svg/mobile-icon.svg#home') }}"></use>
                      </svg>Home </a></li>
                  <li> <a href="search-1.html">
                      <svg>
                        <use xlink:href="{{ asset('assets/clin/svg/mobile-icon.svg#search') }}"></use>
                      </svg>Search </a></li>
                  <li> <a href="cart.html">
                      <svg>
                        <use xlink:href="{{ asset('assets/clin/svg/mobile-icon.svg#cart') }}"></use>
                      </svg>Cart </a></li>
                  <li> <a href="wishlist.html">
                      <svg>
                        <use xlink:href="{{ asset('assets/clin/svg/mobile-icon.svg#heart') }}"></use>
                      </svg>Wishlist</a></li>
                  <li> <a href="doctor-dashboard.html">
                      <svg>
                        <use xlink:href="{{ asset('assets/clin/svg/mobile-icon.svg#user') }}"></use>
                      </svg>Account  </a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-12 p-0"> 
              <div class="main-menu">
                <div class="menu-left"> 
                  <div class="brand-logo"> <a href="index.html"> <img class="img-fluid light" src="{{ asset('assets/clin/images/logo/clinovah.png') }}" alt="Logo"><img class="img-fluid dark" src="{{ asset('assets/clin/images/logo/white-logo2.svg') }}" alt="Logo"></a></div>
                </div>
                <nav id="main-nav">
                  <div class="main-navbar">
                    <ul class="nav-menu sm-horizontal custom-scrollbar" id="sm-horizontal">
                      <li class="back-btn">
                        <div class="mobile-back text-right">
                          <h5>Back</h5><i class="fa fa-angle-right ps-2"></i>
                        </div>
                      </li>
                      <li> <a class="nav-link" href="javascript:void(0)">Home<span class="sub-arrow"><i class="ri-arrow-down-s-line"></i></span></a>
                        <div class="mega-menu">
                          <div class="row gy-4 row-cols-1 row-cols-xl-5">
                            <div class="col">
                              <div class="layout-images dental-care"><a href="layout-2.html"> <img class="img-fluid" src="{{ asset('assets/clin/images/header/2.jpg') }}" alt="demo-2">
                                  <h6>Dental Care</h6></a></div>
                            </div>
                            <div class="col">
                              <div class="layout-images homeopathy-demo"> <a href="index.html"> <img class="img-fluid" src="{{ asset('assets/clin/images/header/1.jpg') }}" alt="demo-1">
                                  <h6>Homeopathy</h6></a></div>
                            </div>
                            <div class="col">
                              <div class="layout-images nutritionist-demo"><a href="layout-3.html"> <img class="img-fluid" src="{{ asset('assets/clin/images/header/3.jpg') }}" alt="demo-3">
                                  <h6>Nutritionist</h6></a></div>
                            </div>
                            <div class="col">
                              <div class="layout-images children-care"> <a href="layout-4.html"> <img class="img-fluid" src="{{ asset('assets/clin/images/header/4.jpg') }}" alt="demo-4">
                                  <h6>Children Care</h6></a></div>
                            </div>
                            <div class="col">
                              <div class="layout-images eyes-care"> <a href="layout-5.html"> <img class="img-fluid" src="{{ asset('assets/clin/images/header/5.jpg') }}" alt="demo-5">
                                  <h6>Eyes Care</h6></a></div>
                            </div>
                            <div class="col">
                              <div class="layout-images"><a href="layout-6.html"> <img class="img-fluid" src="{{ asset('assets/clin/images/header/6.jpg') }}" alt="demo-6">
                                  <h6>Medicine</h6></a></div>
                            </div>
                            <div class="col">
                              <div class="layout-images physiotherapy-demo"> <a href="layout-7.html"> <img class="img-fluid" src="{{ asset('assets/clin/images/header/7.jpg') }}" alt="demo-7">
                                  <h6>Physiotherapy</h6></a></div>
                            </div>
                            <div class="col">
                              <div class="layout-images dermatology-demo"><a href="layout-8.html"> <img class="img-fluid" src="{{ asset('assets/clin/images/header/8.jpg') }}" alt="demo-8">
                                  <h6>Dermatology</h6></a></div>
                            </div>
                            <div class="col">
                              <div class="layout-images cardiologist-demo"><a href="layout-9.html"> <img class="img-fluid" src="{{ asset('assets/clin/images/header/9.jpg') }}" alt="demo-9">
                                  <h6>Cardiologist</h6></a></div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li> <a class="nav-link" href="javascript:void(0)">Shop<span class="sub-arrow"><i class="ri-arrow-down-s-line"></i></span></a>
                        <ul class="sub-menu"> 
                          <li> <a class="nav-link" href="shop.html">Shop Left Sidebar</a></li>
                          <li> <a class="nav-link" href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                          <li> <a class="nav-link" href="shop-no-sidebar.html">Shop No Sidebar</a></li>
                          <li> <a class="nav-link" href="shop-slider.html">Shop Slider</a></li>
                          <li> <a class="nav-link" href="shop-details.html">Shop Detail</a></li>
                          <li> <a class="nav-link" href="shop-images.html">Shop Images</a></li>
                          <li> <a class="nav-link" href="shop-bundle.html">Shop Bundle</a></li>
                          <li> <a class="nav-link" href="shop-variant-accordion.html">Shop Variant Accordion</a></li>
                        </ul>
                      </li>
                      <li> <a class="nav-link" href="javascript:void(0)">ShortCode<span class="sub-arrow"><i class="ri-arrow-down-s-line"></i></span></a>
                        <div class="mega-menu">
                          <div class="row"> 
                            <div class="col-xl-3"> 
                              <ul> 
                                <li> <a href="element_services.html">Services Element</a></li>
                                <li> <a href="element_title.html">title Element</a></li>
                                <li> <a href="element_product_box.html">product Box Element</a></li>
                                <li> <a href="element_label.html">label Element</a></li>
                                <li> <a href="element_about-us.html">about Us Element</a></li>
                                <li> <a href="element_form.html">form Element</a></li>
                              </ul>
                            </div>
                            <div class="col-xl-3"> 
                              <ul> 
                                <li> <a href="element_breadcrumb.html">breadcrumb Element</a></li>
                                <li> <a href="element_button.html">button Element</a></li>
                                <li> <a href="element_after-before.html">after-before Element</a></li>
                                <li> <a href="element_book-appointment.html">book-appointment Element</a></li>
                                <li> <a href="element_doctor-team.html">doctor-team Element</a></li>
                                <li> <a href="element_footer.html">footer Element</a></li>
                              </ul>
                            </div>
                            <div class="col-xl-3"> 
                              <ul> 
                                <li> <a href="element_ratio.html">ratio Element</a></li>
                                <li> <a href="element_subscribe.html">subscribe Element</a></li>
                                <li> <a href="element_map.html">Map Element</a></li>
                                <li> <a href="element_testimonial.html">testimonial Element</a></li>
                                <li> <a href="element_blog.html">blog Element</a></li>
                                <li> <a href="element_product_banner.html">product Banner Element</a></li>
                              </ul>
                            </div>
                            <div class="col-xl-3"> 
                              <ul> 
                                <li> <a href="element_emergency.html">emergency Element</a></li>
                                <li> <a href="element_gallery.html">gallery Element</a></li>
                                <li> <a href="element_counter.html">counter Element</a></li>
                                <li> <a href="element_facilities.html">facilities Element</a></li>
                              </ul>
                            </div>
                            <div class="col-12"> 
                              <div class="video-section-2 d-none d-xl-block">
                                <video autoplay="" loop="" muted="">
                                  <source src="{{ asset('assets/clin/video/1.mp4') }}" type="video/mp4">
                                  <source src="{{ asset('assets/clin/video/1.mp4') }}" type="video/ogg">
                                </video>
                                <p>"Create a unique physiotherapy blog layout that supports patient education and professional branding."</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li> <a class="nav-link" href="javascript:void(0)">Pages <span class="sub-arrow"><i class="ri-arrow-down-s-line"></i></span></a>
                        <div class="mega-menu">
                          <div class="all-pages"> 
                            <div class="row">
                              <div class="col-xl-2">
                                <h5>Booking Page</h5>
                                <ul> 
                                  <li> <a href="booking-1.html">Booking 1</a></li>
                                  <li> <a href="booking-2.html">Booking 2</a></li>
                                </ul>
                                <h5>Service Page</h5>
                                <ul> 
                                  <li> <a href="service-1.html">Service 1</a></li>
                                  <li> <a href="service-2.html">Service 2</a></li>
                                  <li> <a href="service-details.html">Service Details</a></li>
                                </ul>
                                <h5>Sortable Page</h5>
                                <ul> 
                                  <li> <a href="sortable-list.html">Sortable List</a></li>
                                  <li> <a href="sortable-2.html">Sortable 2</a></li>
                                  <li> <a href="sortable-3.html">Sortable 3</a></li>
                                </ul>
                                <h5>Search Page</h5>
                                <ul> 
                                  <li> <a href="search-1.html">Search</a></li>
                                  <li> <a href="search-2.html">Search 2</a></li>
                                  <li> <a href="search-3.html">Search 3</a></li>
                                </ul>
                              </div>
                              <div class="col-xl-2">
                                <h5>Doctors Page</h5>
                                <ul> 
                                  <li> <a href="doctor-details.html">Doctor Details</a></li>
                                  <li> <a href="doctors-list.html">Doctor List</a></li>
                                  <li> <a href="doctor-dashboard.html">Doctor Dashboard</a></li>
                                  <li> <a href="patient-dashboard.html">Patient Dashboard</a></li>
                                  <li> <a href="patients-list.html">Patient list</a></li>
                                  <li> <a href="our-history.html">Our History</a></li>
                                  <li> <a href="our-timetable.html">Our Timetable</a></li>
                                  <li> <a href="chat.html">Doctor Chat</a></li>
                                  <li> <a href="doctor-blog.html">Doctor Blog </a></li>
                                  <li> <a href="add-blog.html">Add Doctor Blog </a></li>
                                  <li> <a href="doctor-profile.html">Doctor Profile</a></li>
                                  <li> <a href="doctor-signup.html">Doctor Sign Up</a></li>
                                  <li> <a href="patient-signup.html">Patient Sign Up</a></li>
                                </ul>
                              </div>
                              <div class="col-xl-2">
                                <h5>Hospitals Page</h5>
                                <ul> 
                                  <li> <a href="hospitals.html">Hospitals</a></li>
                                  <li> <a href="specialty.html">Specialty</a></li>
                                </ul>
                                <h5>portfolio Page</h5>
                                <ul> 
                                  <li> <a href="portfolio.html">Portfolio</a></li>
                                  <li> <a href="portfolio-details.html">Portfolio Details </a></li>
                                </ul>
                                <h5>Other Page</h5>
                                <ul> 
                                  <li> <a href="about-us.html"> About Us</a></li>
                                  <li> <a href="faq.html">Faq</a></li>
                                  <li> <a href="checkout.html">Checkout</a></li>
                                  <li> <a href="payment-success.html">Payment Success</a></li>
                                  <li> <a href="login.html">Login</a></li>
                                  <li> <a href="login-phone.html">Login Phone</a></li>
                                  <li> <a href="otp.html">Otp </a></li>
                                </ul>
                              </div>
                              <div class="col-xl-2">  
                                <ul> 
                                  <li> <a href="sign-up.html">Sign Up</a></li>
                                  <li> <a href="forget-password.html">Forget Password</a></li>
                                  <li> <a href="forget-password-2.html">Forget Password 2</a></li>
                                  <li> <a href="compare.html">Compare</a></li>
                                  <li> <a href="404.html">404</a></li>
                                  <li> <a href="500.html">500</a></li>
                                  <li> <a href="wishlist.html">Wishlist</a></li>
                                  <li> <a href="cart.html">Cart</a></li>
                                  <li> <a href="pricing-plan.html">Pricing plan</a></li>
                                  <li> <a href="maintenance.html">Maintenance</a></li>
                                  <li> <a href="voice-call.html">Voice Call</a></li>
                                  <li> <a href="video-call.html">Video Call</a></li>
                                  <li> <a href="terms-condition.html">Terms Condition</a></li>
                                  <li> <a href="privacy-policy.html">Privacy Policy</a></li>
                                </ul>
                              </div>
                              <div class="col-xl-4 d-none d-xl-block"> 
                                <div class="header-banner-2"> 
                                  <div class="d-flex"> 
                                    <h5>Your Health, Our Expert Care</h5>
                                    <svg> 
                                      <use xlink:href="{{ asset('assets/clin/images/svg/calling.svg#calling-1') }}"></use>
                                    </svg>
                                  </div><a class="btn btn-lg" href="contact.html">
                                     Appointment<span> <i class="fa-solid fa-arrow-right"></i></span></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li> <a class="nav-link" href="javascript:void(0)">Blog<span class="sub-arrow"><i class="ri-arrow-down-s-line"></i></span></a>
                        <ul class="sub-menu"> 
                          <li> <a class="nav-link" href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                          <li> <a class="nav-link" href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                          <li> <a class="nav-link" href="blog-details.html">Blog Details</a></li>
                          <li> <a class="nav-link" href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                          <li> <a class="nav-link" href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                          <li> <a class="nav-link" href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                          <li> <a class="nav-link" href="blog-list-no-sidebar.html">Blog List No Sidebar</a></li>
                        </ul>
                      </li>
                      <li> <a class="nav-link" href="contact.html">Contact</a></li>
                    </ul>
                  </div>
                </nav>
                <div class="menu-right"> 
                  <div class="icon-nav">
                    <div class="default-btn mode me-2"><img class="img-fluid" src="{{ asset('assets/clin/svg/moon.svg') }}" alt="svg"></div>
                    <div class="toggle-nav" id="toggle-nav">
                      <div class="icon"><i class="ri-align-center"></i></div>
                    </div>
                    <ul class="d-flex gap-2"> 
                      <li class="onhover-div mobile-search">
                        <button class="btn default-btn" data-bs-toggle="modal" data-bs-target="#search"><img class="img-fluid" src="{{ asset('assets/clin/svg/search.svg') }}" alt="search"></button>
                      </li>
                      <li>
                        <button class="btn default-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><img class="img-fluid" src="{{ asset('assets/clin/svg/grid.svg') }}" alt="svg"></button>
                      </li>
                      <li class="onhover-dropdown">
                        <button class="btn default-btn"><img class="img-fluid" src="{{ asset('assets/clin/svg/user.svg') }}" alt="user"></button>
                        <ul class="user-dropdown">
                          <li> <a href="login.html">Login</a></li>
                          <li> <a href="sign-up.html">Register</a></li>
                        </ul>
                      </li>
                      <li>
                        <button class="btn default-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart"><img class="img-fluid" src="{{ asset('assets/clin/svg/cart.svg') }}" alt="cart"></button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    @yield('content')

    <!-- Footer Start-->
    <footer> 
      <section class="footer-1">  
        <div class="custom-container container">
          <div class="row gy-3"> 
            <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-5">
              <div class="footer-content">
                <div class="footer-logo"><a href="index.html"> <img class="img-fluid light" src="{{ asset('assets/clin/images/logo/logo2.svg') }}" alt="Logo"><img class="img-fluid dark" src="{{ asset('assets/clin/images/logo/white-logo2.svg') }}" alt="Logo"></a>
                  <p>The healthcare sector urgently needs to develop new systems and upgrade existing ones to enhance efficiency, quality, and patient care.</p>
                </div>
                <ul> 
                  <li> <a href="javascript:void(0)"><i class="ri-map-pin-2-line"></i>
                      <p>A-32, Albany, Newyork. </p></a></li>
                  <li> <a href="tel:+256 200 948068"><i class="ri-phone-fill"></i>
                      <p>(+256) 200 - 948 - 068</p></a></li>
                  <li> <a href="mailto:Contact@clinovah.com"> <i class="ri-mail-fill"></i>
                      <p>Contact@clinovah.com</p></a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xl-60">
              <div class="footer-content">
                <div> 
                  <div class="footer-title d-md-block"> 
                    <h5 class="footer-p"> About </h5>
                    <ul class="footer-details accordion-hidden footer-p"> 
                      <li> <a class="nav" href="about-us.html">About us</a></li>
                      <li> <a class="nav" href="doctors-list.html">Doctor </a></li>
                      <li> <a class="nav" href="faq.html">Faq </a></li>
                      <li> <a class="nav" href="pricing-plan.html">pricing</a></li>
                      <li> <a class="nav" href="blog-left-sidebar.html">Blog</a></li>
                      <li> <a class="nav" href="privacy-policy.html">Privacy</a></li>
                      <li> <a class="nav" href="contact.html">Contact</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-xl-2 col-lg-2 col-md-5 col-sm-4 col-xl-60">
              <div class="footer-content">
                <div>
                  <div class="footer-title d-md-block">
                    <h5>Our Location</h5>
                    <ul class="footer-details accordion-hidden"> 
                      <li class="footer-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47247.51718643815!2d-0.16171645658701894!3d51.51061557179581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2sin!4v1594711805049!5m2!1sen!2sin"></iframe>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-4 col-xl-60">
              <div class="footer-content">
                <div>
                  <div class="footer-title d-md-block"> 
                    <h5 class="footer-p"> Department</h5>
                    <ul class="footer-details accordion-hidden footer-p"> 
                      <li> <a class="nav" href="specialty.html">Surgery </a></li>
                      <li> <a class="nav" href="specialty.html">Women </a></li>
                      <li> <a class="nav" href="specialty.html">Health </a></li>
                      <li> <a class="nav" href="specialty.html">Optician </a></li>
                      <li> <a class="nav" href="specialty.html">Emergency</a></li>
                      <li> <a class="nav" href="specialty.html">ICU</a></li>
                      <li> <a class="nav" href="specialty.html">Dermatology</a></li>
                      <li> <a class="nav" href="specialty.html">Subscribe</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-8 col-sm-8 col-xl-60">
              <div class="footer-content">
                <div class="footer-title d-md-block">
                  <h5>News Feeds</h5>
                  <div class="footer-details accordion-hidden">
                    <div class="footer-blog">
                      <!-- News Item 1-->
                      <div class="d-flex"> 
                        <div class="footer-img"><a href="#!"><img class="img-fluid" src="{{ asset('assets/clin/images/footer/5.jpg') }}" alt="Logo"></a></div>
                        <div class="footer-news">
                          <h6><a class="footer-news" href="doctor-blog.html">Recent News</a></h6><span>New AI Tool Helps Doctors Detect Early Signs of Heart Disease</span>
                        </div>
                      </div>
                      <!-- News Item 2-->
                      <div class="d-flex">
                        <div class="footer-img"><a href="#!"><img class="img-fluid" src="{{ asset('assets/clin/images/footer/6.jpg') }}" alt="Logo"></a></div>
                        <div class="footer-news">
                          <h6><a class="footer-news" href="doctor-blog.html">Recent News</a></h6><span>Medical Council Proposes Telehealth Guidelines for 2025</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </footer>
    <div class="copyright"> 
      <div class="custom-container container">
        <div class="d-flex">
          <div class="flex-grow-1">
            <div class="footer-social"><a href="https://www.google.com/intl/en-GB/gmail/about/#" target="_blank"><img class="img-fluid" src="{{ asset('assets/clin/images/icon/google.png') }}" alt="google icon"></a></div>
            <div class="footer-social"><a href="https://twitter.com/" target="_blank"><img class="img-fluid" src="{{ asset('assets/clin/images/icon/twitter.png') }}" alt="twitter icon"></a></div>
            <div class="footer-social"><a href="https://www.facebook.com/" target="_blank"><img class="img-fluid" src="{{ asset('assets/clin/images/icon/facebook.png') }}" alt="facebook icon"></a></div>
            <div class="footer-social"><a class="instagram" href="https://www.instagram.com/" target="_blank"><img class="img-fluid" src="{{ asset('assets/clin/images/icon/instagram.png') }}" alt="Instagram icon"></a></div>
          </div>
          <div class="flex-shrink-0">
            <p>
               Copyright 2025 Doctor By 	<i class="fa fa-heart"></i><span>
                  Pixelstrap</span></p>
          </div>
        </div>
      </div>
    </div>
    <div class="offcanvas offcanvas-end appointment-offcanvas" id="offcanvasRight" tabindex="-1" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header"><a class="offcanvas-Title" href="index.html" id="offcanvasRightLabel"> <img class="light img-fluid" src="{{ asset('assets/clin/images/logo/logo2.svg') }}" alt="logo"><img class="dark img-fluid" src="{{ asset('assets/clin/images/logo/white-logo2.svg') }}" alt="logo"></a>
        <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><i class="ri-close-line"></i></button>
      </div>
      <div class="offcanvas-body custom-scrollbar">
        <p>It integrates seamlessly with other services, enhancing community health, emergency management, and public safety within a broader ecosystem.</p>
        <ul class="social-icon"> 
          <li> <a href="https://www.facebook.com/" target="_blank"><i class="ri-facebook-line"></i></a></li>
          <li> <a href="https://x.com/" target="_blank"><i class="ri-twitter-x-line"></i></a></li>
          <li> <a href="https://www.instagram.com/" target="_blank"> <i class="ri-instagram-line"></i></a></li>
          <li> <a href="https://www.linkedin.com/" target="_blank"><i class="ri-linkedin-line"> </i></a></li>
        </ul>
        <h5>Visitation Schedule</h5>
        <ul class="day-time"> 
          <li> 
            <p>Mon-Tue: <span>8:00 am - 8:00 pm</span></p>
          </li>
          <li> 
            <p>Wed-Thu: <span>9:00 am - 6:00 pm</span></p>
          </li>
          <li> 
            <p>Friday: <span>1:00 am - 10:00 pm</span></p>
          </li>
          <li> 
            <p>Saturday: <span>9:00 am - 6:00 pm</span></p>
          </li>
          <li> 
            <p>Sunday: <span>9:00 am - 12:00 pm</span></p>
          </li>
        </ul>
        <ul class="contact"> 
          <li> <a href="#"> 
              <div class="icon"> <i class="ri-phone-fill"></i></div><span>+89574123478</span></a></li>
          <li> <a href="#"> 
              <div class="icon"> <i class="ri-mail-fill"></i></div><span>physic@doctor.com</span></a></li>
        </ul>
        <h5>Gallery posts</h5>
        <div class="row g-3"> 
          <div class="col-4">
            <div class="gallery-img"><a href="#"><img class="img-fluid w-100" src="{{ asset('assets/clin/images/others/treatment/1.jpg') }}" alt="treatment1"></a></div>
          </div>
          <div class="col-4">
            <div class="gallery-img"><a href="#"><img class="img-fluid w-100" src="{{ asset('assets/clin/images/others/treatment/2.jpg') }}" alt="treatment2"></a></div>
          </div>
          <div class="col-4">
            <div class="gallery-img"><a href="#"><img class="img-fluid w-100" src="{{ asset('assets/clin/images/others/treatment/3.jpg') }}" alt="treatment3"></a></div>
          </div>
          <div class="col-4">
            <div class="gallery-img"><a href="#"><img class="img-fluid w-100" src="{{ asset('assets/clin/images/others/treatment/4.jpg') }}" alt="treatment4"></a></div>
          </div>
          <div class="col-4">
            <div class="gallery-img"><a href="#"><img class="img-fluid w-100" src="{{ asset('assets/clin/images/others/treatment/5.jpg') }}" alt="treatment5"></a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="offcanvas offcanvas-end cart-offcanvas" id="offcanvasCart" tabindex="-1" aria-labelledby="offcanvasCartLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasCartLabel">My Cart</h5>
        <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><i class="ri-close-line"></i></button>
      </div>
      <div class="offcanvas-body">
        <div class="cart-details">  
          <div> <img class="img-fluid" src="{{ asset('assets/clin/images/gif/cart.gif') }}" alt="cart gif">
            <p>Your cart is currently empty</p>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade theme-modal" id="appointment">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">Close<i class="ri-close-line"></i></button>
          </div>
          <div class="modal-body">
            <div class="header-content"> 
              <h5>Appointment</h5>
            </div>
            <div class="row gy-3">
              <div class="col-md-6">
                <label>Patient Name</label>
                <input type="text" placeholder="Name">
              </div>
              <div class="col-md-6">
                <label>Email Address</label>
                <input type="email" placeholder="Email">
              </div>
              <div class="col-md-6">
                <label>Phone Number</label>
                <input type="Number" placeholder="Number">
              </div>
              <div class="col-md-6">
                <label>Choose Date</label>
                <input type="Date">
              </div>
              <div class="col-md-6">
                <label>Department</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected="">Choose Department</option>
                  <option value="1">Cardiology</option>
                  <option value="2">Dental Care</option>
                  <option value="3">Ophthalmology</option>
                </select>
              </div>
              <div class="col-md-6">
                <label>Department</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected="">Choose Doctor</option>
                  <option value="1">Jordan Peele</option>
                  <option value="2">Jamie Oliver</option>
                  <option value="3">Norton Berry</option>
                </select>
              </div>
              <div class="col-12">
                <label>Address</label>
                <textarea cols="30" rows="4" placeholder="Write your Feedback here..."></textarea>
              </div>
            </div>
            <div class="footer-content">
              <button class="btn btn-md sub-btn-2" type="submit" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
              <button class="btn btn-md sub-btn" type="submit" data-bs-dismiss="modal" aria-label="Close">Submit Now </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade theme-modal feedback-modal" id="feedback">
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">Close<i class="ri-close-line"></i></button>
          </div>
          <div class="modal-body">
            <div class="header-content"> 
              <h5>Feedback</h5>
            </div>
            <h6>How are you feeling ?</h6><span>We value your feedback so that we can better understand your needs and adjust our service.</span>
            <div class="emoji-wrapper">
              <input id="star-1" type="radio" name="rate">
              <input id="star-2" type="radio" name="rate">
              <input id="star-3" type="radio" name="rate">
              <input id="star-4" type="radio" name="rate">
              <input id="star-5" type="radio" name="rate">
              <div class="content">
                <div class="outer">
                  <ul class="emojis">
                    <li class="slideImg"><img class="img-fluid" src="{{ asset('assets/clin/images/others/emoji/angry.png') }}" alt="emoji"></li>
                    <li><img class="img-fluid" src="{{ asset('assets/clin/images/others/emoji/sad.png') }}" alt="emoji"></li>
                    <li><img class="img-fluid" src="{{ asset('assets/clin/images/others/emoji/think.png') }}" alt="emoji"></li>
                    <li><img class="img-fluid" src="{{ asset('assets/clin/images/others/emoji/smile.png') }}" alt="emoji"></li>
                    <li><img class="img-fluid" src="{{ asset('assets/clin/images/others/emoji/love.png') }}" alt="emoji"></li>
                  </ul>
                </div>
                <div class="stars">
                  <label class="star-1 fas fa-star" for="star-1"></label>
                  <label class="star-2 fas fa-star" for="star-2"></label>
                  <label class="star-3 fas fa-star" for="star-3"></label>
                  <label class="star-4 fas fa-star" for="star-4"></label>
                  <label class="star-5 fas fa-star" for="star-5"></label>
                </div>
              </div>
              <textarea cols="30" rows="4" placeholder="Write your Feedback here..."></textarea>
            </div>
            <div class="footer-content">
              <button class="btn btn-md sub-btn" type="submit" data-bs-dismiss="modal" aria-label="Close">Submit Now </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade theme-modal search-modal" id="search">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">Close<i class="ri-close-line"></i></button>
          </div>
          <div class="modal-body">
            <h5>Search Our Doctor</h5>
            <div class="search-box"> 
              <input type="search" name="text" placeholder="Search Our Doctor..."><i class="ri-search-eye-line"></i>
            </div>
            <h6>Our Doctor Name </h6>
            <ul class="doctor-name"> 
              <li> <a href="doctors-list.html">Dr. Ava Bennett</a></li>
              <li> <a href="doctors-list.html">Dr. Ethan Carter</a></li>
              <li> <a href="doctors-list.html">Dr. Mia Roberts</a></li>
              <li> <a href="doctors-list.html">Dr. Oliver Hughes</a></li>
              <li> <a href="doctors-list.html">Dr. Sophia Morgan</a></li>
              <li> <a href="doctors-list.html">Dr. Lucas Anderson</a></li>
            </ul>
            <h6>Highest Searched</h6>
            <ul class="search-doctor custom-scrollbar">
              <li><a href="doctor-details.html"><img class="img-fluid" src="{{ asset('assets/clin/images/others/doctor/1.jpg') }}" alt="doctor1"></a>
                <div class="content"><a href="doctor-details.html">Dr. Ava Bennett</a><span>Pediatric Therapist</span></div>
              </li>
              <li>   <a href="doctor-details.html"><img class="img-fluid" src="{{ asset('assets/clin/images/others/doctor/2.jpg') }}" alt="doctor2"></a>
                <div class="content"><a href="doctor-details.html">Dr. Ava Bennett</a><span>Neurology Therapy</span></div>
              </li>
              <li><a href="doctor-details.html"><img class="img-fluid" src="{{ asset('assets/clin/images/others/doctor/3.jpg') }}" alt="doctor3"></a>
                <div class="content"><a href="doctor-details.html">Dr. Ava Bennett</a><span>Senior Physiotherapist</span></div>
              </li>
              <li><a href="doctor-details.html"><img class="img-fluid" src="{{ asset('assets/clin/images/others/doctor/4.jpg') }}" alt="doctor4"></a>
                <div class="content"><a href="doctor-details.html">Dr. Ava Bennett</a><span>Orthopedic Therapist</span></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="theme-btns">
      <div class="theme-setting btntheme" id="rtl-btn" data-bs-toggle="tooltip" data-bs-title="Rtl Mode"><i class="fa-solid fa-repeat"></i></div>
    </div>
    <div class="scroll-progress"><a class="scroll-top" href="#" aria-label="scroll"><span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point" style="height: 0%;"></span></span></a></div>

    <script src="{{ asset('assets/clin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/clin/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/clin/js/lightgallery/lg-thumbnail.umd.js') }}"></script>
    <script src="{{ asset('assets/clin/js/lightgallery/lightgallery.umd.js') }}"></script>
    <script src="{{ asset('assets/clin/js/lightgallery/lg-zoom.umd.js') }}"></script>
    <script src="{{ asset('assets/clin/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/clin/js/custom-slider.js') }}"></script>
    <script src="{{ asset('assets/clin/js/img-resize.js') }}"></script>
    <script src="{{ asset('assets/clin/js/touchspin.js') }}"></script>
    <script src="{{ asset('assets/clin/js/aos.js') }}"></script>
    <script src="{{ asset('assets/clin/js/aos-custom.js') }}"></script>
    <script src="{{ asset('assets/clin/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/clin/js/tap-to-top.js') }}"></script>
    <script src="{{ asset('assets/clin/js/loader.js') }}"></script>
    <script src="{{ asset('assets/clin/js/theme-setting.js') }}"></script>
    <script src="{{ asset('assets/clin/js/toastify.js') }}"></script>
    <script src="{{ asset('assets/clin/js/script.js') }}"></script>
  </body>
</html>