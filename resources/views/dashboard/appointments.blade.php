@extends('layouts.app')

@section('header')
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('My Appointments') }}
  </h2>
@endsection

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900">
        <div class="mb-4">
          <a href="{{ route('dashboard') }}">&larr; Back to dashboard</a>
        </div>

        <div class="overflow-x-auto">
          <table class="min-w-full">
            <thead>
              <tr class="text-left border-b">
                <th class="py-2">Clinic</th>
                <th class="py-2">Dentist</th>
                <th class="py-2">Date</th>
                <th class="py-2">Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($appointments as $a)
                <tr class="border-b">
                  <td class="py-2">{{ $a->clinic?->name }}</td>
                  <td class="py-2">{{ $a->dentist?->full_name ?? 'Any available' }}</td>
                  <td class="py-2">{{ $a->appointment_at?->format('Y-m-d H:i') }}</td>
                  <td class="py-2">{{ $a->status }}</td>
                </tr>
              @empty
                <tr>
                  <td class="py-2 text-gray-600" colspan="4">No appointments yet.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="mt-4">
          {{ $appointments->links() }}
        </div>
      </div>
    </div>

  </div>
</div>
@endsection