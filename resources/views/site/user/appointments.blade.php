@extends('layouts.site')

@section('title', 'My Appointments')

@section('content')
  <div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1 class="heading-title">My Appointments</h1>
            <p class="mb-0">All your appointment requests and confirmations.</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ route('site.home') }}">Home</a></li>
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="current">My Appointments</li>
        </ol>
      </div>
    </nav>
  </div>

  <section class="section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
      @endif

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped align-middle">
              <thead>
                <tr>
                  <th>Clinic</th>
                  <th>Dentist</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th style="width: 220px;">Action</th>
                </tr>
              </thead>

              <tbody>
                @forelse ($appointments as $a)
                  @php
                    $canCancel = in_array($a->status, ['pending','confirmed'], true);

                    $map = [
                      'pending' => ['bg' => '#f59e0b', 'text' => '#111827'],    // amber
                      'confirmed' => ['bg' => '#22c55e', 'text' => '#052e16'], // green
                      'cancelled' => ['bg' => '#ef4444', 'text' => '#fff'],    // red
                      'no_show' => ['bg' => '#111827', 'text' => '#fff'],      // dark
                      'completed' => ['bg' => '#3b82f6', 'text' => '#fff'],    // blue
                    ];

                    $s = $a->status ?? 'pending';
                    $c = $map[$s] ?? ['bg' => '#6b7280', 'text' => '#fff']; // gray fallback
                  @endphp

                  <tr>
                    <td>{{ $a->clinic?->name }}</td>
                    <td>{{ $a->dentist?->full_name ?? 'Any available' }}</td>
                    <td>{{ $a->appointment_at?->format('Y-m-d H:i') }}</td>
                    <td>
                      <span style="
                        display:inline-block;
                        padding:6px 10px;
                        border-radius:999px;
                        font-size:12px;
                        font-weight:700;
                        letter-spacing:.06em;
                        text-transform:uppercase;
                        background: {{ $c['bg'] }};
                        color: {{ $c['text'] }};
                      ">
                        {{ str_replace('_',' ', $s) }}
                      </span>
                    </td>
                    <td>
                      @if($canCancel)
                        <button
                          class="btn btn-danger btn-sm"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#cancel-{{ $a->id }}"
                          aria-expanded="false"
                          aria-controls="cancel-{{ $a->id }}"
                        >
                          Cancel
                        </button>
                      @else
                        <span class="text-muted">—</span>
                      @endif
                    </td>
                  </tr>

                  @if($canCancel)
                    <tr class="collapse" id="cancel-{{ $a->id }}">
                      <td colspan="5">
                        <div class="p-2 border rounded" style="background:#fafafa;">
                          <form method="POST" action="{{ route('dashboard.appointments.cancel', $a) }}" class="row g-2">
                            @csrf
                            <div class="col-md-5">
                              <input
                                type="text"
                                name="cancellation_reason"
                                class="form-control"
                                required
                                placeholder="Reason (required)"
                              >
                            </div>
                            <div class="col-md-5">
                              <input
                                type="text"
                                name="cancellation_note"
                                class="form-control"
                                placeholder="Note (optional)"
                              >
                            </div>
                            <div class="col-md-2 d-grid">
                              <button class="btn btn-danger" type="submit">Confirm</button>
                            </div>
                          </form>

                          <small class="text-muted d-block mt-2">
                            Tip: cancelling will notify the clinic by email.
                          </small>
                        </div>
                      </td>
                    </tr>
                  @endif

                @empty
                  <tr>
                    <td colspan="5" class="text-center text-muted">No appointments yet.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          {{ $appointments->links() }}
        </div>
      </div>

    </div>
  </section>
@endsection