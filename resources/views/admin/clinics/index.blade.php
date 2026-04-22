@extends('layouts.admin')

@section('title', 'Clinics - Admin')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Clinics</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Clinics</div>
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

    <div class="card">
      <div class="card-header">
        <h4>All Clinics</h4>
        <div class="card-header-action">
          <a href="{{ route('admin.clinics.pending') }}" class="btn btn-warning">Pending Clinics</a>
        </div>
      </div>

      <div class="card-body">
        <div class="mb-3 d-flex flex-wrap" style="gap: .5rem;">
          <a class="btn btn-sm {{ $status ? 'btn-light' : 'btn-primary' }}" href="{{ route('admin.clinics.index') }}">All</a>
          <a class="btn btn-sm {{ $status === 'pending' ? 'btn-primary' : 'btn-light' }}" href="{{ route('admin.clinics.index', ['status' => 'pending']) }}">Pending</a>
          <a class="btn btn-sm {{ $status === 'approved' ? 'btn-primary' : 'btn-light' }}" href="{{ route('admin.clinics.index', ['status' => 'approved']) }}">Approved</a>
          <a class="btn btn-sm {{ $status === 'rejected' ? 'btn-primary' : 'btn-light' }}" href="{{ route('admin.clinics.index', ['status' => 'rejected']) }}">Rejected</a>
        </div>

        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Clinic</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
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
                  <td>
                    @if ($clinic->status === 'approved')
                      <span class="badge badge-success">approved</span>
                    @elseif ($clinic->status === 'rejected')
                      <span class="badge badge-danger">rejected</span>
                    @else
                      <span class="badge badge-warning">pending</span>
                    @endif
                  </td>
                  <td>{{ $clinic->created_at?->format('Y-m-d') }}</td>
                  <td class="text-right">
                    <a href="{{ route('admin.clinics.show', $clinic) }}" class="btn btn-sm btn-outline-primary">View</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center text-muted">No clinics found.</td>
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