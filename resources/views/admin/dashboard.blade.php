@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@php
  $pct = function ($current, $previous) {
    $current = (float) $current;
    $previous = (float) $previous;

    if ($previous == 0) {
      return $current > 0 ? 100 : 0;
    }
    return round((($current - $previous) / $previous) * 100);
  };

  $bookingsPct  = $pct($bookingsThisMonth, $bookingsLastMonth);
  $customersPct = $pct($customersThisMonth, $customersLastMonth);
  $clinicsPct   = $pct($clinicsThisMonth, $clinicsLastMonth);
  $revenuePct   = $pct($revenueThisMonth, $revenueLastMonth);

  $badgeClass = fn($v) => $v >= 0 ? 'col-green' : 'col-orange';
  $trendText  = fn($v) => $v >= 0 ? 'Increase' : 'Decrease';
@endphp

@section('content')
<div class="main-content">
  <section class="section">
    <div class="row ">
      {{-- New Booking --}}
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">New Booking</h5>
                    <h2 class="mb-3 font-18">{{ number_format($bookingsThisMonth) }}</h2>
                    <p class="mb-0">
                      <span class="{{ $badgeClass($bookingsPct) }}">{{ abs($bookingsPct) }}%</span>
                      {{ $trendText($bookingsPct) }}
                    </p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="{{ asset('assets/admin/img/banner/1.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Customers --}}
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Customers</h5>
                    <h2 class="mb-3 font-18">{{ number_format($customersTotal) }}</h2>
                    <p class="mb-0">
                      <span class="{{ $badgeClass($customersPct) }}">{{ abs($customersPct) }}%</span>
                      {{ $trendText($customersPct) }}
                    </p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="{{ asset('assets/admin/img/banner/2.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- New Clinics --}}
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">New Clinics</h5>
                    <h2 class="mb-3 font-18">{{ number_format($clinicsThisMonth) }}</h2>
                    <p class="mb-0">
                      <span class="{{ $badgeClass($clinicsPct) }}">{{ abs($clinicsPct) }}%</span>
                      {{ $trendText($clinicsPct) }}
                    </p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="{{ asset('assets/admin/img/banner/3.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Revenue (0 for now) --}}
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Revenue</h5>
                    <h2 class="mb-3 font-18">${{ number_format($revenueThisMonth, 0) }}</h2>
                    <p class="mb-0">
                      <span class="{{ $badgeClass($revenuePct) }}">{{ abs($revenuePct) }}%</span>
                      {{ $trendText($revenuePct) }}
                    </p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="{{ asset('assets/admin/img/banner/4.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
@endsection

@push('page-scripts')
<script src="{{ asset('assets/admin/js/page/index.js') }}"></script>
@endpush