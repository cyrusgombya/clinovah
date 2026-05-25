@extends('layouts.clinic-otika')

@section('title', 'Appointments')

@section('content')
  <div class="section-header">
    <h1>Appointments</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active">
        <a href="{{ route('clinic.dashboard') }}">Dashboard</a>
      </div>

      <div class="breadcrumb-item">
        Appointments
      </div>
    </div>
  </div>

  @if (session('status'))
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>

        {{ session('status') }}
      </div>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>

        {{ $errors->first() }}
      </div>
    </div>
  @endif

  <div class="row">
    <div class="col-12">

      <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center flex-wrap" style="gap:12px;">
          <h4 class="mb-0">Manage appointments</h4>

          <form method="GET"
                action="{{ route('clinic.appointments.index') }}"
                class="d-flex flex-wrap"
                style="gap:10px;">

            <input type="hidden" name="tab" value="{{ $tab }}">

            <input type="text"
                   name="q"
                   class="form-control"
                   placeholder="Search patient..."
                   value="{{ request('q') }}">

            <button class="btn btn-primary" type="submit">
              Search
            </button>
          </form>
        </div>

        <div class="card-body">

          <ul class="nav nav-pills mb-4">

            <li class="nav-item">
              <a class="nav-link {{ $tab === 'upcoming' ? 'active' : '' }}"
                 href="{{ route('clinic.appointments.index', ['tab' => 'upcoming']) }}">
                Upcoming
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ $tab === 'past' ? 'active' : '' }}"
                 href="{{ route('clinic.appointments.index', ['tab' => 'past']) }}">
                Past
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ $tab === 'cancelled' ? 'active' : '' }}"
                 href="{{ route('clinic.appointments.index', ['tab' => 'cancelled']) }}">
                Cancelled
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ $tab === 'no_show' ? 'active' : '' }}"
                 href="{{ route('clinic.appointments.index', ['tab' => 'no_show']) }}">
                No-show
              </a>
            </li>

          </ul>

          <div class="table-responsive">

            <table class="table table-striped table-md">

              <thead>
              <tr>
                <th>Date</th>
                <th>Patient</th>
                <th>Dentist</th>
                <th>Service</th>
                <th>Status</th>
                <th style="width: 460px;">Actions</th>
              </tr>
              </thead>

              <tbody>

              @forelse($appointments as $a)

                @php
                  $badge = match ($a->status) {
                    'confirmed' => 'badge-success',
                    'pending' => 'badge-warning',
                    'cancelled' => 'badge-danger',
                    'no_show' => 'badge-dark',
                    'completed' => 'badge-info',
                    default => 'badge-light',
                  };

                  $dentists = $clinic->dentists ?? collect();
                @endphp

                <tr>

                  {{-- DATE --}}
                  <td>
                    <div class="font-weight-600">
                      {{ $a->appointment_at->format('Y-m-d') }}
                    </div>

                    <div class="text-muted">
                      {{ $a->appointment_at->format('H:i') }}
                    </div>
                  </td>

                  {{-- PATIENT --}}
                  <td>

                    <div class="font-weight-600">
                      {{ $a->user?->name ?? $a->patient_name ?? 'Guest Patient' }}
                    </div>

                    <div class="text-muted small">
                      {{ $a->user?->email ?? $a->patient_email ?? 'No email provided' }}
                    </div>

                    <div class="text-muted small">
                      Ref:
                      <strong>{{ $a->booking_reference }}</strong>
                    </div>

                    @if($a->patient_phone)
                      <div class="text-muted small">
                        {{ $a->patient_phone }}
                      </div>
                    @endif

                    @if($a->user)
                      <div class="text-muted small">
                        No-shows:
                        {{ $a->user->no_show_count ?? 0 }}
                      </div>
                    @else
                      <div class="text-muted small">
                        Guest booking
                      </div>
                    @endif

                  </td>

                  {{-- DENTIST --}}
                  <td>
                    {{ $a->dentist?->full_name ?? '—' }}
                  </td>

                  {{-- SERVICE --}}
                  <td>
                    {{ $a->service ?? '—' }}
                  </td>

                  {{-- STATUS --}}
                  <td>
                    <span class="badge {{ $badge }}">
                      {{ strtoupper(str_replace('_',' ', $a->status)) }}
                    </span>
                  </td>

                  {{-- ACTIONS --}}
                  <td>

                    <div class="d-flex flex-wrap align-items-center" style="gap:8px;">

                      {{-- CONFIRM --}}
                      @if($a->status === 'pending')

                        <form method="POST"
                              action="{{ route('clinic.appointments.confirm', $a) }}"
                              class="d-flex flex-wrap align-items-center"
                              style="gap:8px;">

                          @csrf

                          <select name="dentist_id"
                                  class="form-control form-control-sm"
                                  style="min-width: 200px;"
                                  required>

                            <option value="" disabled {{ empty($a->dentist_id) ? 'selected' : '' }}>
                              Select dentist...
                            </option>

                            @foreach($dentists as $d)

                              <option value="{{ $d->id }}"
                                {{ (int) $a->dentist_id === (int) $d->id ? 'selected' : '' }}>

                                {{ $d->full_name }}

                              </option>

                            @endforeach

                          </select>

                          <button class="btn btn-sm btn-success" type="submit">
                            Confirm
                          </button>

                        </form>

                      @endif

                      {{-- WHATSAPP --}}
                      @if($a->patient_phone)

                        @php
                          $waNumber = preg_replace(
                              '/^0/',
                              '256',
                              preg_replace('/\D/', '', $a->patient_phone)
                          );

                          $waMessage = urlencode(
                            "Hello {$a->patient_name}, this is a reminder for your appointment at {$clinic->name} on "
                            . $a->appointment_at->format('D, M d Y')
                            . " at "
                            . $a->appointment_at->format('h:i A')
                            . ".\n\n"
                            . "Reference: {$a->booking_reference}\n\n"
                            . "Please arrive a few minutes early. Reply here if you need assistance."
                            );
                        @endphp

                        <a href="https://wa.me/{{ $waNumber }}?text={{ $waMessage }}"
                           target="_blank"
                           class="btn btn-sm btn-success">

                          Send Reminder

                        </a>

                      @endif

                      {{-- CANCEL --}}
                      @if(in_array($a->status, ['pending','confirmed'], true))

                        <button class="btn btn-sm btn-danger"
                                type="button"
                                data-toggle="collapse"
                                data-target="#cancel-{{ $a->id }}">

                          Cancel

                        </button>

                      @endif

                      {{-- NO SHOW --}}
                      @if(
                        in_array($a->status, ['pending','confirmed'], true)
                        && $a->appointment_at->isPast()
                      )

                        <form method="POST"
                              action="{{ route('clinic.appointments.no_show', $a) }}">

                          @csrf

                          <button class="btn btn-sm btn-dark" type="submit">
                            Mark No-show
                          </button>

                        </form>

                      @endif

                    </div>

                    {{-- CANCEL FORM --}}
                    @if(in_array($a->status, ['pending','confirmed'], true))

                      <div class="collapse mt-2" id="cancel-{{ $a->id }}">

                        <div class="card card-body mb-0">

                          <form method="POST"
                                action="{{ route('clinic.appointments.cancel', $a) }}">

                            @csrf

                            <div class="form-group mb-2">
                              <label class="mb-1">Reason</label>

                              <input type="text"
                                     name="cancellation_reason"
                                     class="form-control"
                                     required
                                     placeholder="e.g. Dentist unavailable / Clinic closed">
                            </div>

                            <div class="form-group mb-2">
                              <label class="mb-1">Note (optional)</label>

                              <textarea name="cancellation_note"
                                        class="form-control"
                                        rows="2"
                                        placeholder="Extra details for the patient..."></textarea>
                            </div>

                            <button class="btn btn-sm btn-danger" type="submit">
                              Confirm cancel
                            </button>

                          </form>

                        </div>

                      </div>

                    @endif

                    {{-- CANCELLED INFO --}}
                    @if($a->status === 'cancelled')

                      <div class="text-muted small mt-2">

                        <strong>Reason:</strong>
                        {{ $a->cancellation_reason }}

                        <br>

                        @if($a->cancellation_note)

                          <strong>Note:</strong>
                          {{ $a->cancellation_note }}

                        @endif

                      </div>

                    @endif

                  </td>

                </tr>

              @empty

                <tr>
                  <td colspan="6" class="text-center py-5">

                    <div class="text-muted">

                      <h6 class="mb-2">
                        No appointments found
                      </h6>

                      <p class="mb-0">
                        New bookings will appear here once patients begin scheduling appointments.
                      </p>

                    </div>

                  </td>
                </tr>

              @endforelse

              </tbody>

            </table>

          </div>

          <div class="mt-3">
            {{ $appointments->links() }}
          </div>

        </div>
      </div>

    </div>
  </div>
@endsection