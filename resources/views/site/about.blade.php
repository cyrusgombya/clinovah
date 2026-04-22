@extends('layouts.site')

@section('title', 'About - Clinic')
@section('body_class', 'about-page')

@section('content')
<main class="main">

  <!-- Page Title -->
  <div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1 class="heading-title">About</h1>
            <p class="mb-0">
              We make it easier for people to find trusted dental clinics, explore available services, and book appointments online. Our platform connects patients with verified dentists so accessing dental care becomes simple, fast, and convenient.
            </p>
          </div>
        </div>
      </div>
    </div>

    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ route('site.home') }}">Home</a></li>
          <li class="current">About</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <!-- About Section -->
  <section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
          <div class="about-content">
            <h2>Making Dental Care Easy to Access</h2>

            <p class="lead">
              For over two decades, we have been dedicated to providing exceptional healthcare services to our community...
            </p>

            <p class="lead">
              Our platform helps patients easily discover trusted dental clinics and schedule appointments online without the hassle of phone calls or long waiting times.
            </p>

            <div class="stats-grid">
              <div class="stat-item">
                <span class="stat-number" data-purecounter-start="0" data-purecounter-end="15000" data-purecounter-duration="2">15000</span>
                <span class="stat-label">Appointments Booked</span>
              </div>
              <div class="stat-item">
                <span class="stat-number" data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="2">25</span>
                <span class="stat-label">Partner Clinics</span>
              </div>
              <div class="stat-item">
                <span class="stat-number" data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="2">50</span>
                <span class="stat-label">Verified Dentists</span>
              </div>
            </div><!-- End Stats Grid -->
          </div><!-- End About Content -->
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
          <div class="image-wrapper">
            <img src="{{ asset('assets/site/img/health/facilities-6.webp') }}" class="img-fluid main-image" alt="Healthcare facility">
            <div class="floating-image" data-aos="zoom-in" data-aos-delay="400">
              <img src="{{ asset('assets/site/img/health/staff-8.webp') }}" class="img-fluid" alt="Medical team">
            </div>
          </div><!-- End Image Wrapper -->
        </div>
      </div>

      <div class="values-section" data-aos="fade-up" data-aos-delay="300">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h3>Our Core Values</h3>
            <p class="section-description">
              Our platform is built on values that ensure patients and clinics can trust the services we provide.
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="value-item">
              <div class="value-icon">
                <i class="bi bi-heart-pulse"></i>
              </div>
              <h4>Patient First</h4>
              <p>We prioritize the needs of patients by making it simple to find reliable dental care and schedule appointments quickly.</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="value-item">
              <div class="value-icon">
                <i class="bi bi-shield-check"></i>
              </div>
              <h4>Quality Care</h4>
              <p>We work with verified clinics and qualified dental professionals to ensure patients receive trusted care.</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="value-item">
              <div class="value-icon">
                <i class="bi bi-people"></i>
              </div>
              <h4>Trust &amp; Transparency</h4>
              <p>Accurate clinic information, honest communication, and clear appointment scheduling help build trust with our users.</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="value-item">
              <div class="value-icon">
                <i class="bi bi-lightbulb"></i>
              </div>
              <h4>Innovation</h4>
              <p>We embrace technology to improve the experience of finding clinics, booking appointments, and managing dental care.</p>
            </div>
          </div>
        </div><!-- End Values Row -->
      </div><!-- End Values Section -->

      <div class="certifications-section" data-aos="fade-up" data-aos-delay="400">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h3>Trusted Clinics &amp; Partners</h3>
            <p class="section-description">
              We collaborate with trusted dental clinics and professionals committed to providing quality dental care.
            </p>
          </div>
        </div>

      

        <a href="/clinics" class="btn btn-primary">Find Dental Clinics</a>
      </div><!-- End Certifications Section -->

    </div>
  </section><!-- /About Section -->

</main>
@endsection