@extends('layouts.admin')

@section('title', 'Clinic Details - Admin')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Clinic Details</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin.clinics.index') }}">Clinics</a></div>
        <div class="breadcrumb-item">{{ $clinic->name }}</div>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert"><span>&times;</span></button>
          {{ session('success') }}
        </div>
      </div>
    @endif

    @if ($errors->has('approval'))
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert"><span>&times;</span></button>
          {{ $errors->first('approval') }}
        </div>
      </div>
    @endif

    <div class="row">
      <div class="col-lg-8">

        {{-- Clinic Information --}}
        <div class="card">
          <div class="card-header">
            <h4>Clinic Information</h4>
          </div>
          <div class="card-body">
            <div class="row mb-2">
              <div class="col-md-4 text-muted">Name</div>
              <div class="col-md-8 font-weight-bold">{{ $clinic->name }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-md-4 text-muted">Email</div>
              <div class="col-md-8">{{ $clinic->email }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-md-4 text-muted">Phone</div>
              <div class="col-md-8">{{ $clinic->phone ?? '—' }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-md-4 text-muted">Address</div>
              <div class="col-md-8">{{ $clinic->address ?? '—' }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-md-4 text-muted">Location</div>
              <div class="col-md-8">
                @if ($clinic->latitude && $clinic->longitude)
                  {{ $clinic->latitude }}, {{ $clinic->longitude }}
                @else
                  —
                @endif
              </div>
            </div>

            <div class="row mb-2">
              <div class="col-md-4 text-muted">Working Hours</div>
              <div class="col-md-8">{{ $clinic->working_hours ?? '—' }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-md-4 text-muted">Price Range</div>
              <div class="col-md-8">{{ $clinic->price_range ?? '—' }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-md-4 text-muted">Services</div>
              <div class="col-md-8">
                @if ($clinic->services)
                  <div class="border rounded p-2" style="white-space: pre-wrap;">{{ $clinic->services }}</div>
                @else
                  —
                @endif
              </div>
            </div>
          </div>
        </div>

        {{-- Clinic Documents --}}
        <div class="card">
          <div class="card-header">
            <h4>Clinic Documents</h4>
          </div>
          <div class="card-body">

            @if (!empty($missingClinicDocTypes))
              <div class="alert alert-warning">
                <strong>Missing required clinic documents:</strong>
                <ul class="mb-0">
                  @foreach ($missingClinicDocTypes as $t)
                    <li>{{ $t }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th>File</th>
                    <th>Status</th>
                    <th>Uploaded</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($clinic->documents as $doc)
                    <tr>
                      <td>{{ $doc->type }}</td>
                      <td>{{ $doc->original_name }}</td>
                      <td>
                        @if ($doc->status === 'approved')
                          <span class="badge badge-success">approved</span>
                        @elseif ($doc->status === 'rejected')
                          <span class="badge badge-danger">rejected</span>
                        @else
                          <span class="badge badge-warning">pending</span>
                        @endif
                      </td>
                      <td>{{ $doc->created_at?->format('Y-m-d') }}</td>
                      <td class="text-right">
                        <a class="btn btn-sm btn-outline-primary" target="_blank" href="{{ route('admin.clinic-documents.view', $doc) }}">View</a>
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.clinic-documents.download', $doc) }}">Download</a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center text-muted">No clinic documents uploaded.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

          </div>
        </div>

        {{-- Dentists + Dentist Documents --}}
        <div class="card">
          <div class="card-header">
            <h4>Dentists & Documents</h4>
          </div>
          <div class="card-body">

            @if (!$hasAtLeastOneDentist)
              <div class="alert alert-warning">
                No dentists added for this clinic yet.
              </div>
            @elseif (!$hasDentistWithAllRequiredDocs)
              <div class="alert alert-warning">
                No dentist has all required documents yet.
                <div class="mt-2">
                  <strong>Required dentist docs:</strong>
                  <ul class="mb-0">
                    @foreach ($requiredDentistDocTypes as $t)
                      <li>{{ $t }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            @endif

            @forelse ($clinic->dentists as $dentist)
              <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-0">{{ $dentist->full_name }}</h6>
                    <small class="text-muted">
                      {{ $dentist->email ?? '—' }} | {{ $dentist->phone ?? '—' }}
                    </small>
                  </div>
                </div>

                <div class="table-responsive mt-2">
                  <table class="table table-sm table-striped">
                    <thead>
                      <tr>
                        <th>Type</th>
                        <th>File</th>
                        <th>Issued</th>
                        <th>Expires</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($dentist->documents as $ddoc)
                        <tr>
                          <td>{{ $ddoc->type }}</td>
                          <td>{{ $ddoc->original_name }}</td>
                          <td>{{ $ddoc->issued_at?->format('Y-m-d') ?? '—' }}</td>
                          <td>{{ $ddoc->expires_at?->format('Y-m-d') ?? '—' }}</td>
                          <td>
                            @if ($ddoc->status === 'approved')
                              <span class="badge badge-success">approved</span>
                            @elseif ($ddoc->status === 'rejected')
                              <span class="badge badge-danger">rejected</span>
                            @else
                              <span class="badge badge-warning">pending</span>
                            @endif
                          </td>
                          <td class="text-right">
                            <a class="btn btn-sm btn-outline-primary" target="_blank" href="{{ route('admin.dentist-documents.view', $ddoc) }}">View</a>
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.dentist-documents.download', $ddoc) }}">Download</a>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="6" class="text-center text-muted">No documents for this dentist.</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            @empty
              <div class="text-muted">No dentists found.</div>
            @endforelse

          </div>
        </div>

      </div>

      {{-- Right Column --}}
      <div class="col-lg-4">

        {{-- Approval --}}
        <div class="card">
          <div class="card-header">
            <h4>Approval</h4>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <div class="text-muted">Current Status</div>
              <div class="mt-1">
                @if ($clinic->status === 'approved')
                  <span class="badge badge-success">approved</span>
                @elseif ($clinic->status === 'rejected')
                  <span class="badge badge-danger">rejected</span>
                @else
                  <span class="badge badge-warning">pending</span>
                @endif
              </div>
            </div>

            <div class="mb-3">
              <div class="text-muted">Approved At</div>
              <div>{{ $clinic->approved_at?->format('Y-m-d H:i') ?? '—' }}</div>
            </div>

            <div class="mb-3">
              <div class="text-muted">Rejected At</div>
              <div>{{ $clinic->rejected_at?->format('Y-m-d H:i') ?? '—' }}</div>
            </div>

            @if ($clinic->rejection_reason)
              <div class="mb-3">
                <div class="text-muted">Rejection Reason</div>
                <div class="border rounded p-2">{{ $clinic->rejection_reason }}</div>
              </div>
            @endif

            <div class="d-flex flex-wrap" style="gap: .5rem;">
              <form method="POST" action="{{ route('admin.clinics.approve', $clinic) }}">
                @csrf
                <button type="submit" class="btn btn-success"
                        {{ (!$canApprove || $clinic->status === 'approved') ? 'disabled' : '' }}>
                  Approve
                </button>
              </form>

              <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#rejectBox" aria-expanded="false" aria-controls="rejectBox">
                Reject
              </button>
            </div>

            @if (!$canApprove && $clinic->status !== 'approved')
              <small class="text-muted d-block mt-2">
                Approval is disabled until required clinic + dentist documents are uploaded.
              </small>
            @endif

            <div class="collapse mt-3" id="rejectBox">
              <form method="POST" action="{{ route('admin.clinics.reject', $clinic) }}">
                @csrf
                <div class="form-group">
                  <label for="rejection_reason">Rejection reason (optional)</label>
                  <input type="text" name="rejection_reason" id="rejection_reason" class="form-control" maxlength="255" value="{{ old('rejection_reason') }}">
                  @error('rejection_reason')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-danger btn-block" {{ $clinic->status === 'rejected' ? 'disabled' : '' }}>
                  Confirm Rejection
                </button>
              </form>
            </div>
          </div>
        </div>

        {{-- Quick Links --}}
        <div class="card">
          <div class="card-header">
            <h4>Quick Links</h4>
          </div>
          <div class="card-body">
            <a href="{{ route('admin.clinics.pending') }}" class="btn btn-warning btn-block">Pending Clinics</a>
            <a href="{{ route('admin.clinics.index') }}" class="btn btn-primary btn-block">All Clinics</a>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
@endsection