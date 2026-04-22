@extends('layouts.clinic-otika')

@section('title', 'Clinic Documents')

@section('content')
  <div class="section-header">
    <h1>Clinic Documents</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('clinic.dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item">Clinic Documents</div>
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
    {{-- Upload form (single submit) --}}
    <div class="col-12 col-lg-5">
      <div class="card">
        <div class="card-header">
          <h4>Submit documents for verification</h4>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('clinic.documents.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>Clinic Operating License (Health Unit license)</label>
              <input type="file"
                     name="clinic_operating_license"
                     class="form-control @error('clinic_operating_license') is-invalid @enderror"
                     accept=".pdf,.jpg,.jpeg,.png"
                     required>
              @error('clinic_operating_license')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Business Registration (URSB certificate)</label>
              <input type="file"
                     name="business_registration_ursb"
                     class="form-control @error('business_registration_ursb') is-invalid @enderror"
                     accept=".pdf,.jpg,.jpeg,.png"
                     required>
              @error('business_registration_ursb')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group mb-0">
              <button class="btn btn-primary btn-lg btn-block" type="submit">
                Submit Documents
              </button>
            </div>
          </form>

          <div class="mt-3 text-muted small">
            Upload these documents once. Admin will review them.
          </div>
        </div>
      </div>
    </div>

    {{-- Upload history --}}
    <div class="col-12 col-lg-7">
      <div class="card">
        <div class="card-header">
          <h4>Upload history</h4>
        </div>

        <div class="card-body p-0">
          @if($documents->isEmpty())
            <div class="p-4">
              <div class="empty-state" data-height="300">
                <div class="empty-state-icon bg-primary">
                  <i class="fas fa-file-upload"></i>
                </div>
                <h2>No documents uploaded yet</h2>
                <p class="lead">
                  Submit your clinic documents to start the verification process.
                </p>
              </div>
            </div>
          @else
            <div class="table-responsive">
              <table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th>File</th>
                    <th>Status</th>
                    <th>Uploaded</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($documents as $doc)
                    @php
                      $typeLabel = match ($doc->type) {
                        'clinic_operating_license' => 'Operating License',
                        'business_registration_ursb' => 'URSB Registration',
                        default => $doc->type,
                      };

                      $badge = match ($doc->status) {
                        'approved' => 'badge-success',
                        'rejected' => 'badge-danger',
                        default => 'badge-warning',
                      };
                    @endphp

                    <tr>
                      <td>{{ $typeLabel }}</td>
                      <td class="text-truncate" style="max-width: 240px;">{{ $doc->original_name }}</td>
                      <td><span class="badge {{ $badge }}">{{ strtoupper($doc->status) }}</span></td>
                      <td>{{ $doc->created_at->format('Y-m-d H:i') }}</td>
                    </tr>

                    @if($doc->status === 'rejected' && $doc->rejection_reason)
                      <tr>
                        <td colspan="4" class="text-danger">
                          <strong>Rejection reason:</strong> {{ $doc->rejection_reason }}
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>
      </div>

      {{-- Status helper --}}
      <div class="card">
        <div class="card-header">
          <h4>Verification status</h4>
        </div>
        <div class="card-body">
          @if($clinic->status !== 'approved')
            <div class="alert alert-info mb-0">
              <strong>Waiting for approval.</strong><br>
              After submitting documents, you can continue setting up your clinic and adding dentists.
            </div>
          @else
            <div class="alert alert-success mb-0">
              <strong>Approved.</strong> Your clinic is verified and visible to patients.
            </div>
          @endif
        </div>
      </div>

    </div>
  </div>
@endsection