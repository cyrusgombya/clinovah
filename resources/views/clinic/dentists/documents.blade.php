@extends('layouts.clinic-otika')

@section('title', 'Dentist Documents')

@section('content')
  <div class="section-header">
    <h1>Dentist Documents</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ route('clinic.dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('clinic.dentists') }}">Dentists</a></div>
      <div class="breadcrumb-item">{{ $dentist->full_name }}</div>
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
    {{-- Upload form --}}
    <div class="col-12 col-lg-5">
      <div class="card">
        <div class="card-header">
          <h4>Upload dentist document</h4>
        </div>

        <div class="card-body">
          <form method="POST"
                action="{{ route('clinic.dentists.documents.store', $dentist) }}"
                enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>Document Type</label>
              <select name="type" class="form-control @error('type') is-invalid @enderror">
                <option value="annual_practicing_license" {{ old('type') === 'annual_practicing_license' ? 'selected' : '' }}>
                  Annual Practicing License (expires yearly)
                </option>
                <option value="umdpc_registration_certificate" {{ old('type') === 'umdpc_registration_certificate' ? 'selected' : '' }}>
                  UMDPC Registration Certificate
                </option>
                <option value="national_id" {{ old('type') === 'national_id' ? 'selected' : '' }}>
                  National ID
                </option>
              </select>
              @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Issued date (optional)</label>
                <input type="date"
                       name="issued_at"
                       value="{{ old('issued_at') }}"
                       class="form-control @error('issued_at') is-invalid @enderror">
                @error('issued_at')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label>Expiry date (required for annual license)</label>
                <input type="date"
                       name="expires_at"
                       value="{{ old('expires_at') }}"
                       class="form-control @error('expires_at') is-invalid @enderror">
                @error('expires_at')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label>File (PDF/JPG/PNG, max 5MB)</label>
              <input type="file"
                     name="document"
                     class="form-control @error('document') is-invalid @enderror"
                     required>
              @error('document')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group mb-0">
              <button class="btn btn-primary btn-lg btn-block" type="submit">
                Upload
              </button>
            </div>
          </form>

          <div class="mt-3 text-muted small">
            Note: For “Annual Practicing License” you must provide an expiry date in the future.
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
                  <i class="fas fa-id-card"></i>
                </div>
                <h2>No dentist documents</h2>
                <p class="lead">
                  Upload dentist documents to complete verification.
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
                    <th>Issued</th>
                    <th>Expires</th>
                    <th>Status</th>
                    <th>Uploaded</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($documents as $doc)
                    @php
                      $expired = $doc->expires_at && $doc->expires_at->isPast();

                      $typeLabel = match ($doc->type) {
                        'annual_practicing_license' => 'Annual License',
                        'umdpc_registration_certificate' => 'UMDPC Certificate',
                        'national_id' => 'National ID',
                        default => $doc->type,
                      };

                      $badge = match ($doc->status) {
                        'approved' => 'badge-success',
                        'rejected' => 'badge-danger',
                        default => 'badge-warning',
                      };
                    @endphp

                    <tr class="{{ $expired ? 'table-danger' : '' }}">
                      <td>{{ $typeLabel }}</td>
                      <td class="text-truncate" style="max-width: 220px;">{{ $doc->original_name }}</td>
                      <td>{{ $doc->issued_at?->format('Y-m-d') ?? '—' }}</td>
                      <td>
                        {{ $doc->expires_at?->format('Y-m-d') ?? '—' }}
                        @if($expired)
                          <span class="badge badge-danger ml-1">EXPIRED</span>
                        @endif
                      </td>
                      <td><span class="badge {{ $badge }}">{{ strtoupper($doc->status) }}</span></td>
                      <td>{{ $doc->created_at->format('Y-m-d H:i') }}</td>
                    </tr>

                    @if($doc->status === 'rejected' && $doc->rejection_reason)
                      <tr>
                        <td colspan="6" class="text-danger">
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

      <div class="card">
        <div class="card-header">
          <h4>Tip</h4>
        </div>
        <div class="card-body">
          <div class="alert alert-light mb-0">
            Keep documents current—expired licenses may delay approval.
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection