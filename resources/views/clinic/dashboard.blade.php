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
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Appointments</h5>
                  <h2 class="mb-3 font-18">—</h2>
                  <p class="mb-0"><span class="col-green">Soon</span> analytics</p>
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

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Dentists</h5>
                  <h2 class="mb-3 font-18">{{ $clinic->dentists()->count() }}</h2>
                  <p class="mb-0">Team size</p>
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

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Clinic Docs</h5>
                  <h2 class="mb-3 font-18">{{ $clinic->documents()->count() }}</h2>
                  <p class="mb-0">Uploads</p>
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

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Profile</h5>
                  <h2 class="mb-3 font-18">—</h2>
                  <p class="mb-0">Coming soon</p>
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

  {{-- Quick actions --}}
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header"><h4>Quick actions</h4></div>
        <div class="card-body">
          <a href="{{ route('clinic.documents') }}" class="btn btn-primary mr-2">Clinic Documents</a>
          <a href="{{ route('clinic.dentists') }}" class="btn btn-info">Manage Dentists</a>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header"><h4>Account</h4></div>
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
  {{-- Page Specific JS File (only on dashboard) --}}
  <script src="{{ asset('assets/admin/assets/js/page/index.js') }}"></script>
@endpush