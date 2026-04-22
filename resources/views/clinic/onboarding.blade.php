@extends('layouts.clinic-otika')

@section('title', 'Onboarding')

@section('content')
  <div class="section-header">
    <h1>Onboarding</h1>
  </div>

  @if (session('status'))
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        {{ session('status') }}
      </div>
    </div>
  @endif

  <div class="alert alert-info">
    <strong>Complete these steps to activate your clinic.</strong><br>
    Once done, this onboarding page will disappear and you’ll see your full dashboard.
  </div>

  <div class="row">
    {{-- Step 1: clinic documents --}}
    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-header">
          <h4>1) Clinic Documents</h4>
        </div>
        <div class="card-body">
          @if($clinicDocsComplete)
            <div class="badge badge-success mb-2">Completed</div>
            <p class="text-muted mb-0">Required clinic documents are uploaded.</p>
          @else
            <div class="badge badge-warning mb-2">Pending</div>
            <p class="text-muted">Upload Operating License and URSB Registration.</p>
            <a href="{{ route('clinic.documents') }}" class="btn btn-primary btn-block">Upload clinic docs</a>
          @endif
        </div>
      </div>
    </div>

    {{-- Step 2: add dentist --}}
    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-header">
          <h4>2) Add Dentist</h4>
        </div>
        <div class="card-body">
          @if($hasDentist)
            <div class="badge badge-success mb-2">Completed</div>
            <p class="text-muted mb-0">You’ve added at least one dentist.</p>
          @else
            <div class="badge badge-warning mb-2">Pending</div>
            <p class="text-muted">Add at least one dentist to proceed.</p>
            <a href="{{ route('clinic.dentists') }}" class="btn btn-info btn-block">Add dentist</a>
          @endif
        </div>
      </div>
    </div>

    {{-- Step 3: dentist documents --}}
    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-header">
          <h4>3) Dentist Documents</h4>
        </div>
        <div class="card-body">
          @if($dentistDocsComplete)
            <div class="badge badge-success mb-2">Completed</div>
            <p class="text-muted mb-0">At least one dentist has all required documents.</p>
          @else
            <div class="badge badge-warning mb-2">Pending</div>
            <p class="text-muted">Upload Annual License, UMDPC certificate, and National ID.</p>

            @if(($dentists ?? collect())->isEmpty())
              <div class="alert alert-light mb-0">Add a dentist first.</div>
            @else
              <div class="list-group">
                @foreach($dentists as $dentist)
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                     href="{{ route('clinic.dentists.documents', $dentist) }}">
                    {{ $dentist->full_name }}
                    <span class="badge badge-primary">Upload docs</span>
                  </a>
                @endforeach
              </div>
            @endif
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection