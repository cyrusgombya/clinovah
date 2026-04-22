@extends('layouts.admin')

@section('title', 'Pending Clinics - Admin')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pending Clinics</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin.clinics.index') }}">Clinics</a></div>
        <div class="breadcrumb-item">Pending</div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4>Waiting Approval</h4>
        <div class="card-header-action">
          <a href="{{ route('admin.clinics.index') }}" class="btn btn-primary">All Clinics</a>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Clinic</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created</th>
                <th class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($clinics as $clinic)
                <tr>
                  <td>{{ $clinic->id }}</td>
                  <td>{{ $clinic->name }}</td>
                  <td>{{ $clinic->email }}</td>
                  <td>{{ $clinic->phone ?? '—' }}</td>
                  <td>{{ $clinic->created_at?->format('Y-m-d') }}</td>
                  <td class="text-right">
                    <a href="{{ route('admin.clinics.show', $clinic) }}" class="btn btn-sm btn-outline-primary">Review</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center text-muted">No pending clinics.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          {{ $clinics->links() }}
        </div>
      </div>
    </div>
  </section>
</div>
@endsection