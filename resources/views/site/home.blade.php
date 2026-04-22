@extends('layouts.site')

@section('title', 'Home - Clinic')
@section('body_class', 'index-page')

@section('content')
<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="hero-content">
            <div class="trust-badges mb-4" data-aos="fade-right" data-aos-delay="200">
              <div class="badge-item">
                <i class="bi bi-shield-check"></i>
                <span>Accredited</span>
              </div>
              <div class="badge-item">
                <i class="bi bi-clock"></i>
                <span>24/7 Emergency</span>
              </div>
            </div>

            <h1 data-aos="fade-right" data-aos-delay="300">
              Find and Book <span class="highlight">Trusted Dentists</span> Near You
            </h1>

            <p class="hero-description" data-aos="fade-right" data-aos-delay="400">
           Finding the right dentist should be simple and stress-free. Our platform helps you discover trusted dental clinics near you, compare services, and book appointments online in just a few clicks. Save time, avoid long calls, and take the first step toward a healthier smile today.
            </p>

            <div class="hero-stats mb-4" data-aos="fade-right" data-aos-delay="500">
              <div class="stat-item">
                <h3><span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="2"
                    class="purecounter"></span>+</h3>
                <p>Years Experience</p>
              </div>
              <div class="stat-item">
                <h3><span data-purecounter-start="0" data-purecounter-end="5000" data-purecounter-duration="2"
                    class="purecounter"></span>+</h3>
                <p>Patients Treated</p>
              </div>
              <div class="stat-item">
                <h3><span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="2"
                    class="purecounter"></span>+</h3>
                <p>Medical Experts</p>
              </div>
            </div>

            <div class="hero-actions" data-aos="fade-right" data-aos-delay="600">
              <a href="{{ route('clinics.index') }}" class="btn btn-primary">Book Appointment</a>
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn btn-outline glightbox">
                <i class="bi bi-play-circle me-2"></i>
                Watch Our Story
              </a>
            </div>

            <div class="emergency-contact" data-aos="fade-right" data-aos-delay="700">
              <div class="emergency-icon">
                <i class="bi bi-telephone-fill"></i>
              </div>
              <div class="emergency-info">
                <small>Emergency Hotline</small>
                <strong>+256 123 456 789</strong>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
            <div class="main-image">
              <img src="{{ asset('assets/site/img/health/staff-10.webp') }}" alt="Modern Healthcare Facility" class="img-fluid">
              <div class="floating-card appointment-card">
                <div class="card-icon">
                  <i class="bi bi-calendar-check"></i>
                </div>
                <div class="card-content">
                  <h6>24/7</h6>
                  <small>Cyrus Dental</small>
                </div>
              </div>
              <div class="floating-card rating-card">
                <div class="card-content">
                  <div class="rating-stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <h6>4.9/5</h6>
                  <small>1,234 Reviews</small>
                </div>
              </div>
            </div>
            <div class="background-elements">
              <div class="element element-1"></div>
              <div class="element element-2"></div>
              <div class="element element-3"></div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /Hero Section -->

  <!-- Home About Section -->
  <section id="home-about" class="home-about section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
          <div class="about-content">
          <h2 class="section-heading">Making Dental Care Easy to Access</h2>
                <p class="lead-text">
                Our platform connects patients with trusted dental clinics, making it simple to find the right dentist and book appointments online in just a few minutes.
                </p>

                <p>
                We work with verified dental professionals to ensure patients receive quality care in a safe and reliable environment. By bringing clinics and patients together on one platform, we help simplify appointment scheduling, reduce waiting times, and make dental care more convenient for everyone.
                </p>
            <div class="stats-grid">
              <div class="stat-item">
                <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="1"
                  data-purecounter-duration="1"></div>
                <div class="stat-label">Patients Served</div>
              </div>
              <div class="stat-item">
                <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="1"
                  data-purecounter-duration="1"></div>
                <div class="stat-label">Years of Excellence</div>
              </div>
              <div class="stat-item">
                <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="3"
                  data-purecounter-duration="1"></div>
                <div class="stat-label">Medical Specialists</div>
              </div>
            </div>

            <div class="cta-section">
              <a href="{{ route('site.about') }}" class="btn-primary">Learn More About Us</a>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
          <div class="about-visual">
            <div class="main-image">
              <img src="{{ asset('assets/site/img/health/facilities-9.webp') }}" alt="Modern medical facility" class="img-fluid">
            </div>
            <div class="floating-card">
              <div class="card-content">
                <div class="icon">
                  <i class="bi bi-heart-pulse"></i>
                </div>
                <div class="card-text">
                  <h4>24/7 Emergency Care</h4>
                  <p>Always here when you need us most</p>
                </div>
              </div>
            </div>
            <div class="experience-badge">
              <div class="badge-content">
                <span class="years">1+</span>
                <span class="text">Years of Trusted Care</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /Home About Section -->

  <!-- Featured Departments Section -->
  <section id="featured-departments" class="featured-departments section">

    <div class="container section-title" data-aos="fade-up">
     <h2>Dental Services</h2>
<p>Explore a range of dental services offered by trusted clinics on our platform. From routine checkups to advanced treatments, find the right care for your smile.</p>     
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-5">

        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="specialty-card">
            <div class="specialty-content">
              <div class="specialty-meta">
                <span class="specialty-label">Specialized Care</span>
              </div>
                        <h3>General Dentistry</h3>
                            <p>Routine dental care focused on maintaining healthy teeth and gums through professional checkups, cleanings, and preventive treatments.</p>

                            <div class="specialty-features">
                            <span><i class="bi bi-check-circle-fill"></i>Regular Dental Checkups</span>
                            <span><i class="bi bi-check-circle-fill"></i>Professional Teeth Cleaning</span>
                            </div>
                            
             
            </div>
            <div class="specialty-visual">
              <img src="{{ asset('assets/site/img/health/cardiology-1.webp') }}" alt="Cardiovascular Medicine" class="img-fluid">
              <div class="visual-overlay">
                <i class="bi bi-heart-pulse"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="specialty-card">
            <div class="specialty-content">
              <div class="specialty-meta">
                <span class="specialty-label">Expert Care</span>
              </div>
                    <h3>Cosmetic Dentistry</h3>
        <p>Modern cosmetic treatments designed to enhance the appearance of your smile using safe and effective dental techniques.</p>

        <div class="specialty-features">
        <span><i class="bi bi-check-circle-fill"></i>Teeth Whitening</span>
        <span><i class="bi bi-check-circle-fill"></i>Smile Makeovers</span>
        </div>


             
            </div>
            <div class="specialty-visual">
              <img src="{{ asset('assets/site/img/health/neurology-4.webp') }}" alt="Neurological Sciences" class="img-fluid">
              <div class="visual-overlay">
                <i class="bi bi-cpu"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="department-highlight">
            <div class="highlight-icon">
              <i class="bi bi-shield-plus"></i>
            </div>
            <h4>Pediatric Dentistry</h4>
    <p>Gentle and friendly dental care designed specifically for children, helping them develop healthy dental habits early.</p>

    <ul class="highlight-list">
    <li>Child Dental Checkups</li>
    <li>Preventive Care</li>
    <li>Fluoride Treatments</li>
    </ul>
            <a href="{{ route('clinics.index') }}" class="highlight-cta">Book Today</a>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="department-highlight">
            <div class="highlight-icon">
              <i class="bi bi-people"></i>
            </div>
                    <h4>Oral Surgery</h4>
            <p>Advanced dental procedures performed by experienced specialists to treat complex dental conditions.</p>

            <ul class="highlight-list">
            <li>Tooth Extractions</li>
            <li>Wisdom Tooth Removal</li>
            <li>Dental Implants</li>
            </ul>
            <a href="{{ route('clinics.index') }}" class="highlight-cta">Book Today</a>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="department-highlight">
            <div class="highlight-icon">
              <i class="bi bi-activity"></i>
            </div>
            <h4>Cancer Treatment</h4>
            <p>Multidisciplinary oncology program offering personalized cancer care with latest therapeutic
              innovations.</p>
            <ul class="highlight-list">
              <li>Precision Medicine</li>
              <li>Immunotherapy</li>
              <li>Radiation Oncology</li>
            </ul>
            <a href="{{ route('clinics.index') }}" class="highlight-cta">Book Today</a>
          </div>
        </div>

      </div>

      <div class="emergency-banner" data-aos="fade-up" data-aos-delay="400">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <div class="emergency-content">
             <h3>Need Urgent Dental Care?</h3>
<p>Find dental clinics near you that provide emergency dental services for severe tooth pain, injuries, or urgent treatments.</p>
            </div>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a href="tel:+15551234567" class="emergency-btn">
              <i class="bi bi-telephone-fill"></i>
              Call Emergency: (555) 123-4567
            </a>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /Featured Departments Section -->

  <!-- Featured Services Section -->
  <section id="featured-services" class="featured-services section">

    <div class="container section-title" data-aos="fade-up">
     <h2>Featured Dental Services</h2>
<p>Discover dental services offered by trusted clinics on our platform and easily book an appointment that fits your schedule.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-0">

        <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
          <div class="featured-service-main">
            <div class="service-image-wrapper">
              <img src="{{ asset('assets/site/img/health/consultation-4.webp') }}" alt="Premier Healthcare Services" class="img-fluid" loading="lazy">
              <div class="service-overlay">
                <div class="service-badge">
                  <i class="bi bi-heart-pulse"></i>
                  <span>Emergency Care</span>
                </div>
              </div>
            </div>
            <div class="service-details">
              <h2>Easy Dental Appointment Booking</h2>
<p>Find trusted dental clinics near you, explore available services, and book appointments online in just a few minutes. Our platform connects patients with verified dentists to make accessing dental care simple and convenient.</p>
             
            </div>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
          <div class="services-sidebar">

            <div class="service-item" data-aos="fade-up" data-aos-delay="400">
              <div class="service-icon-wrapper">
                <i class="bi bi-capsule"></i>
              </div>
              <div class="service-info">
               <h4>General Dentistry</h4>
<p>Routine dental checkups, professional cleaning, and preventive treatments to keep your teeth and gums healthy.</p>
                <a href="{{ route('site.services') }}" class="service-link">Learn More</a>
              </div>
            </div>

            <div class="service-item" data-aos="fade-up" data-aos-delay="500">
              <div class="service-icon-wrapper">
                <i class="bi bi-bandaid"></i>
              </div>
              <div class="service-info">
                <h4>Cosmetic Dentistry</h4>
<p>Improve the appearance of your smile with services like teeth whitening, veneers, and smile makeovers.</p>
                <a href="{{ route('site.services') }}" class="service-link">Learn More</a>
              </div>
            </div>

            <div class="service-item" data-aos="fade-up" data-aos-delay="600">
              <div class="service-icon-wrapper">
                <i class="bi bi-activity"></i>
              </div>
              <div class="service-info">
              <h4>Orthodontic Care</h4>
<p>Straighten teeth and improve bite alignment with braces, clear aligners, and other orthodontic treatments.</p>
                <a href="{{ route('site.services') }}" class="service-link">Learn More</a>
              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="specialties-grid" data-aos="fade-up" data-aos-delay="300">
        <div class="row align-items-center">

          <div class="col-lg-3 col-md-6">
            <div class="specialty-card">
              <div class="specialty-image">
                <img src="{{ asset('assets/site/img/health/maternal-2.webp') }}" alt="Maternal Care" class="img-fluid" loading="lazy">
              </div>
              <div class="specialty-content">
                <h5>Teeth Cleaning</h5>
<span>Professional cleaning for healthy teeth</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="specialty-card">
              <div class="specialty-image">
                <img src="{{ asset('assets/site/img/health/vaccination-3.webp') }}" alt="Vaccination" class="img-fluid" loading="lazy">
              </div>
              <div class="specialty-content">
              <h5>Teeth Whitening</h5>
<span>Brighten your smile safely</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="specialty-card">
              <div class="specialty-image">
                <img src="{{ asset('assets/site/img/health/emergency-1.webp') }}" alt="Emergency Care" class="img-fluid" loading="lazy">
              </div>
              <div class="specialty-content">
                <h5>Emergency Dentistry</h5>
<span>Quick care for urgent dental problems</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="specialty-card">
              <div class="specialty-image">
                <img src="{{ asset('assets/site/img/health/facilities-6.webp') }}" alt="Advanced Tech" class="img-fluid" loading="lazy">
              </div>
              <div class="specialty-content">
               <h5>Modern Dental Clinics</h5>
<span>Clinics equipped with modern dental technology</span>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </section><!-- /Featured Services Section -->

  <!-- Find A Doctor Section --
  <section id="find-a-doctor" class="find-a-doctor section">

    <div class="container section-title" data-aos="fade-up">
      <h2>Find A Doctor</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-8 text-center">
          <div class="search-section">
            <h3 class="search-title">Find Your Perfect Healthcare Provider</h3>
            <p class="search-subtitle">Search through our comprehensive directory of experienced medical professionals</p>
            <form class="search-form" action="#!" method="#">
              <div class="search-input-group">
                <div class="input-wrapper">
                  <i class="bi bi-person"></i>
                  <input type="text" class="form-control" name="doctor_name" placeholder="Enter doctor name">
                </div>
                <div class="select-wrapper">
                  <i class="bi bi-heart-pulse"></i>
                  <select class="form-select" name="specialty">
                    <option value="">All Specialties</option>
                    <option value="cardiology">Cardiology</option>
                    <option value="neurology">Neurology</option>
                    <option value="orthopedics">Orthopedics</option>
                    <option value="pediatrics">Pediatrics</option>
                    <option value="dermatology">Dermatology</option>
                    <option value="oncology">Oncology</option>
                  </select>
                </div>
                <button type="submit" class="search-btn">
                  <i class="bi bi-search"></i>
                  Find Doctors
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="doctors-grid" data-aos="fade-up" data-aos-delay="300">
        <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="100">
          <div class="profile-header">
            <div class="doctor-avatar">
              <img src="{{ asset('assets/site/img/health/staff-2.webp') }}" alt="Dr. Amanda Foster" class="img-fluid">
              <div class="status-indicator available"></div>
            </div>
            <div class="doctor-details">
              <h4>Dr. Amanda Foster</h4>
              <span class="specialty-tag">Cardiology Specialist</span>
              <div class="experience-info">
                <i class="bi bi-award"></i>
                <span>14 years experience</span>
              </div>
            </div>
          </div>
          <div class="rating-section">
            <div class="stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <span class="rating-score">4.9</span>
            <span class="review-count">(127 reviews)</span>
          </div>
          <div class="action-buttons">
            <a href="#!" class="btn-secondary">View Details</a>
            <a href="#!" class="btn-primary">Book Now</a>
          </div>
        </div>

        <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="200">
          <div class="profile-header">
            <div class="doctor-avatar">
              <img src="{{ asset('assets/site/img/health/staff-6.webp') }}" alt="Dr. Marcus Johnson" class="img-fluid">
              <div class="status-indicator busy"></div>
            </div>
            <div class="doctor-details">
              <h4>Dr. Marcus Johnson</h4>
              <span class="specialty-tag">Neurology Expert</span>
              <div class="experience-info">
                <i class="bi bi-award"></i>
                <span>16 years experience</span>
              </div>
            </div>
          </div>
          <div class="rating-section">
            <div class="stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i>
            </div>
            <span class="rating-score">4.8</span>
            <span class="review-count">(89 reviews)</span>
          </div>
          <div class="action-buttons">
            <a href="#!" class="btn-secondary">View Details</a>
            <a href="#!" class="btn-primary">Schedule</a>
          </div>
        </div>

        <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="300">
          <div class="profile-header">
            <div class="doctor-avatar">
              <img src="{{ asset('assets/site/img/health/staff-4.webp') }}" alt="Dr. Rachel Williams" class="img-fluid">
              <div class="status-indicator available"></div>
            </div>
            <div class="doctor-details">
              <h4>Dr. Rachel Williams</h4>
              <span class="specialty-tag">Pediatrics Care</span>
              <div class="experience-info">
                <i class="bi bi-award"></i>
                <span>11 years experience</span>
              </div>
            </div>
          </div>
          <div class="rating-section">
            <div class="stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <span class="rating-score">5.0</span>
            <span class="review-count">(203 reviews)</span>
          </div>
          <div class="action-buttons">
            <a href="#!" class="btn-secondary">View Details</a>
            <a href="#!" class="btn-primary">Book Now</a>
          </div>
        </div>

        <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="400">
          <div class="profile-header">
            <div class="doctor-avatar">
              <img src="{{ asset('assets/site/img/health/staff-8.webp') }}" alt="Dr. David Chen" class="img-fluid">
              <div class="status-indicator offline"></div>
            </div>
            <div class="doctor-details">
              <h4>Dr. David Chen</h4>
              <span class="specialty-tag">Orthopedic Surgery</span>
              <div class="experience-info">
                <i class="bi bi-award"></i>
                <span>22 years experience</span>
              </div>
            </div>
          </div>
          <div class="rating-section">
            <div class="stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i>
            </div>
            <span class="rating-score">4.7</span>
            <span class="review-count">(156 reviews)</span>
          </div>
          <div class="action-buttons">
            <a href="#!" class="btn-secondary">View Details</a>
            <a href="#!" class="btn-primary">Schedule</a>
          </div>
        </div>

        <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="500">
          <div class="profile-header">
            <div class="doctor-avatar">
              <img src="{{ asset('assets/site/img/health/staff-11.webp') }}" alt="Dr. Victoria Torres" class="img-fluid">
              <div class="status-indicator available"></div>
            </div>
            <div class="doctor-details">
              <h4>Dr. Victoria Torres</h4>
              <span class="specialty-tag">Dermatology Care</span>
              <div class="experience-info">
                <i class="bi bi-award"></i>
                <span>9 years experience</span>
              </div>
            </div>
          </div>
          <div class="rating-section">
            <div class="stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star"></i>
            </div>
            <span class="rating-score">4.5</span>
            <span class="review-count">(74 reviews)</span>
          </div>
          <div class="action-buttons">
            <a href="#!" class="btn-secondary">View Details</a>
            <a href="#!" class="btn-primary">Book Now</a>
          </div>
        </div>

        <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="600">
          <div class="profile-header">
            <div class="doctor-avatar">
              <img src="{{ asset('assets/site/img/health/staff-14.webp') }}" alt="Dr. Benjamin Lee" class="img-fluid">
              <div class="status-indicator available"></div>
            </div>
            <div class="doctor-details">
              <h4>Dr. Benjamin Lee</h4>
              <span class="specialty-tag">Oncology Treatment</span>
              <div class="experience-info">
                <i class="bi bi-award"></i>
                <span>19 years experience</span>
              </div>
            </div>
          </div>
          <div class="rating-section">
            <div class="stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <span class="rating-score">4.9</span>
            <span class="review-count">(194 reviews)</span>
          </div>
          <div class="action-buttons">
            <a href="#!" class="btn-secondary">View Details</a>
            <a href="#!" class="btn-primary">Schedule</a>
          </div>
        </div>
      </div>

      <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700">
        <a href="{{ route('site.doctors') }}" class="btn-view-all">
          View All Doctors
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

    </div>

  </section><!-- /Find A Doctor Section -->

  <!-- Call To Action Section -->
  <section id="call-to-action" class="call-to-action section light-background">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="hero-content">
        <div class="row align-items-center">

          <div class="col-lg-6">
            <div class="content-wrapper" data-aos="fade-up" data-aos-delay="200">
             <h1>Find and Book Trusted Dental Clinics Near You</h1>
<p>Discover verified dental clinics in your area, explore the services they offer, and schedule your appointment online in just a few minutes. Our platform makes accessing dental care simple, fast, and convenient.</p>

              <div class="cta-wrapper">
                <a href="{{ route('clinics.index') }}" class="primary-cta">
                  <span><span>Book Dental Appointment</span></span>
                  <i class="bi bi-arrow-right"></i>
                </a>
                <a href="{{ route('clinics.index') }}" class="secondary-cta">
                  <span>Browse Dental Clinics</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="image-container" data-aos="fade-left" data-aos-delay="300">
              <img src="{{ asset('assets/site/img/health/facilities-9.webp') }}" alt="Medical Excellence" class="img-fluid">
            </div>
          </div>

        </div>
      </div>

      <div class="features-section">

        <div class="row g-0">

          <div class="col-lg-4">
            <div class="feature-block" data-aos="fade-up" data-aos-delay="200">
              <div class="feature-icon">
                <i class="bi bi-shield-check"></i>
              </div>
             <h3>Verified Dental Clinics</h3>
<p>We work with trusted dental professionals to ensure patients can confidently book appointments with reliable clinics.</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="feature-block" data-aos="fade-up" data-aos-delay="300">
              <div class="feature-icon">
                <i class="bi bi-clock"></i>
              </div>
             <h3>Easy Online Booking</h3>
<p>Search clinics, view available time slots, and book dental appointments online anytime without making phone calls.</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="feature-block" data-aos="fade-up" data-aos-delay="400">
              <div class="feature-icon">
                <i class="bi bi-people"></i>
              </div>
             <h3>Convenient Scheduling</h3>
<p>Choose a dentist, pick a suitable time, and manage your appointments easily from your personal dashboard.</p>
            </div>
          </div>

        </div>

      </div>

      <div class="contact-block">
        <div class="row">

          <div class="col-lg-8">
            <div class="contact-content" data-aos="fade-up" data-aos-delay="200">
              <h2>Looking for a Dental Clinic Near You?</h2>
<p>Search nearby dental clinics, view available services, and schedule an appointment that fits your time.</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="contact-actions" data-aos="fade-up" data-aos-delay="300">
              <a href="tel:5551234567" class="emergency-call">
                <i class="bi bi-telephone"></i>
                <span>(555) 123-4567</span>
              </a>
              <a href="{{ route('site.contact') }}" class="contact-link">Find Clinics Near You </a>
            </div>
          </div>

        </div>
      </div>

    </div>

  </section><!-- /Call To Action Section -->

</main>
@endsection