@extends('layouts.clinic-otika')

@section('title', 'Dentists')

@section('content')
  <div class="section-header">
    <h1>Dentists</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('clinic.dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item">Dentists</div>
    </div>
  </div>

  @if (session('status'))
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        {{ session('status') }}
      </div>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        Please fix the errors below and try again.
      </div>
    </div>
  @endif

  <div class="row">
    {{-- Add dentist + documents --}}
    <div class="col-12 col-lg-5">
      <div class="card">
        <div class="card-header">
          <h4>Add dentist (with documents)</h4>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('clinic.dentists.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>Full Name</label>
              <input
                type="text"
                name="full_name"
                value="{{ old('full_name') }}"
                class="form-control @error('full_name') is-invalid @enderror"
                required
              >
              @error('full_name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Email (optional)</label>
              <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror"
              >
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Phone (optional)</label>
              <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
                class="form-control @error('phone') is-invalid @enderror"
              >
              @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <hr>

            <h6 class="mb-3">Required documents</h6>

            <div class="form-group">
              <label>Annual Practicing License (PDF/JPG/PNG, max 5MB)</label>
              <input
                type="file"
                name="annual_practicing_license"
                class="form-control @error('annual_practicing_license') is-invalid @enderror"
                accept=".pdf,.jpg,.jpeg,.png"
                required
              >
              @error('annual_practicing_license')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <small class="form-text text-muted">Upload the latest annual license.</small>
            </div>

            <div class="form-group">
              <label>Annual License Expiry Date (required)</label>
              <input
                type="date"
                name="annual_practicing_license_expires_at"
                value="{{ old('annual_practicing_license_expires_at') }}"
                class="form-control @error('annual_practicing_license_expires_at') is-invalid @enderror"
                required
              >
              @error('annual_practicing_license_expires_at')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <small class="form-text text-muted">Must be a future date.</small>
            </div>

            <div class="form-group">
              <label>UMDPC Registration Certificate (PDF/JPG/PNG, max 5MB)</label>
              <input
                type="file"
                name="umdpc_registration_certificate"
                class="form-control @error('umdpc_registration_certificate') is-invalid @enderror"
                accept=".pdf,.jpg,.jpeg,.png"
                required
              >
              @error('umdpc_registration_certificate')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>National ID (PDF/JPG/PNG, max 5MB)</label>
              <input
                type="file"
                name="national_id"
                class="form-control @error('national_id') is-invalid @enderror"
                accept=".pdf,.jpg,.jpeg,.png"
                required
              >
              @error('national_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group mb-0">
              <button class="btn btn-primary btn-lg btn-block" type="submit">
                Add Dentist + Submit Documents
              </button>
            </div>
          </form>

          <div class="mt-3 text-muted small">
            Add your dentists with their documents so your clinic can be approved faster.
          </div>
        </div>
      </div>
    </div>

    {{-- Dentists table --}}
    <div class="col-12 col-lg-7">
      <div class="card">
        <div class="card-header">
          <h4>Your dentists</h4>
        </div>

        <div class="card-body p-0">
          @if($dentists->isEmpty())
            <div class="p-4">
              <div class="empty-state" data-height="300">
                <div class="empty-state-icon bg-info">
                  <i class="fas fa-user-md"></i>
                </div>
                <h2>No dentists yet</h2>
                <p class="lead">
                  Add at least one dentist (with documents) to complete onboarding and start receiving bookings.
                </p>
              </div>
            </div>
          @else
            <div class="table-responsive">
              <table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th style="width: 160px;">Documents</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dentists as $dentist)
                    <tr>
                      <td>{{ $dentist->full_name }}</td>
                      <td>{{ $dentist->email ?? '—' }}</td>
                      <td>{{ $dentist->phone ?? '—' }}</td>
                      <td>
                        <a href="{{ route('clinic.dentists.documents', $dentist) }}"
                           class="btn btn-sm btn-outline-primary">
                          View
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>
      </div>

      {{-- Helpful next step --}}
      <div class="card">
        <div class="card-header">
          <h4>Next steps</h4>
        </div>
        <div class="card-body">
          <div class="alert alert-light mb-0">
            After adding a dentist with documents, return to the dashboard to confirm onboarding is complete.
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection