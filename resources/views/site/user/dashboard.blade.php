@extends('layouts.site')

@section('title', 'Dashboard')

@section('content')
  <div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1 class="heading-title">Your Dashboard</h1>
            <p class="mb-0">Manage your appointments and keep track of upcoming visits.</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ route('site.home') }}">Home</a></li>
          <li class="current">Dashboard</li>
        </ol>
      </div>
    </nav>
  </div>

  <section class="section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Upcoming Appointments</h3>
        <a href="{{ route('dashboard.appointments') }}" class="btn btn-primary btn-sm">View All</a>
      </div>

      <div class="card">
        <div class="card-body">
          @if ($upcoming->count() === 0)
            <div class="alert alert-info mb-0">
              You have no upcoming appointments. Browse <a href="{{ route('clinics.index') }}">clinics</a> to book one.
            </div>
          @else
            <div class="table-responsive">
              <table class="table table-striped align-middle mb-0">
                <thead>
                  <tr>
                    <th>Clinic</th>
                    <th>Dentist</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($upcoming as $a)
                    <tr>
                      <td>{{ $a->clinic?->name }}</td>
                      <td>{{ $a->dentist?->full_name ?? 'Any available' }}</td>
                      <td>{{ $a->appointment_at?->format('Y-m-d H:i') }}</td>
                      <td><span class="badge bg-secondary text-uppercase">{{ $a->status }}</span></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>
      </div>

    </div>
  </section>
@endsection