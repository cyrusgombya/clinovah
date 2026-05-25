@extends('layouts.clinic-otika')

@section('title', 'Clinic Dashboard')

@section('content')
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  @if ($clinic->status !== 'approved')
    <div class="alert alert-info">
      <strong>Verification submitted.</strong><br>
      Your documents have been received. Please wait for admin approval.
      Meanwhile, you can continue setting up your profile and adding dentists/documents.
    </div>
  @endif

  <div class="row">

    {{-- Today --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Today</h5>
                  <h2 class="mb-3 font-18">{{ $todayAppointments }}</h2>
                  <p class="mb-0"><span class="col-green">Appointments</span></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('assets/admin/assets/img/banner/1.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Pending --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Pending</h5>
                  <h2 class="mb-3 font-18">{{ $pendingAppointments }}</h2>
                  <p class="mb-0"><span class="col-orange">Needs review</span></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('assets/admin/assets/img/banner/2.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Confirmed --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Confirmed</h5>
                  <h2 class="mb-3 font-18">{{ $confirmedAppointments }}</h2>
                  <p class="mb-0"><span class="col-green">Upcoming</span></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('assets/admin/assets/img/banner/3.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Total --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Total</h5>
                  <h2 class="mb-3 font-18">{{ $totalAppointments }}</h2>
                  <p class="mb-0"><span class="col-blue">All bookings</span></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('assets/admin/assets/img/banner/4.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="row">

    {{-- Dentists --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Dentists</h5>
                  <h2 class="mb-3 font-18">{{ $dentistsCount }}</h2>
                  <p class="mb-0">Clinic team</p>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('assets/admin/assets/img/banner/2.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Documents --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Documents</h5>
                  <h2 class="mb-3 font-18">{{ $documentsCount }}</h2>
                  <p class="mb-0">Clinic uploads</p>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('assets/admin/assets/img/banner/3.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Status --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Status</h5>
                  <h2 class="mb-3 font-18">{{ strtoupper($clinic->status) }}</h2>
                  <p class="mb-0">Clinic visibility</p>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('assets/admin/assets/img/banner/1.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Profile --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Profile</h5>
                  <h2 class="mb-3 font-18">{{ $clinic->onboarding_completed ? 'Done' : 'Setup' }}</h2>
                  <p class="mb-0">Clinic details</p>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('assets/admin/assets/img/banner/4.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  {{-- Quick actions --}}
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h4>Quick actions</h4>
        </div>

        <div class="card-body">
          <a href="{{ route('clinic.appointments.index') }}" class="btn btn-success mr-2 mb-2">
            View Appointments
          </a>

          <a href="{{ route('clinic.documents') }}" class="btn btn-primary mr-2 mb-2">
            Clinic Documents
          </a>

          <a href="{{ route('clinic.dentists') }}" class="btn btn-info mr-2 mb-2">
            Manage Dentists
          </a>

          <a href="{{ route('clinic.profile.edit') }}" class="btn btn-warning mb-2">
            Edit Profile
          </a>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h4>Clinic account</h4>
        </div>

        <div class="card-body">
          <p class="mb-1"><strong>Email:</strong> {{ $clinic->email }}</p>
          <p class="mb-1"><strong>Phone:</strong> {{ $clinic->phone ?? '—' }}</p>
          <p class="mb-0"><strong>Status:</strong> {{ strtoupper($clinic->status) }}</p>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/admin/assets/js/page/index.js') }}"></script>
@endpush