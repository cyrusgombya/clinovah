@extends('layouts.app')

@section('header')
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Dashboard') }}
  </h2>
@endsection

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900">
        <div class="mb-4">
          <a href="{{ route('dashboard.appointments') }}">View all appointments</a>
        </div>

        <h3 class="font-semibold mb-2">Upcoming appointments</h3>

        @if ($upcoming->count() === 0)
          <div class="text-gray-600">No upcoming appointments.</div>
        @else
          <ul class="list-disc ml-5">
            @foreach ($upcoming as $a)
              <li>
                {{ $a->appointment_at?->format('Y-m-d H:i') }} —
                {{ $a->clinic?->name }}
                ({{ $a->dentist?->full_name ?? 'Any available dentist' }})
                — {{ $a->status }}
              </li>
            @endforeach
          </ul>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection