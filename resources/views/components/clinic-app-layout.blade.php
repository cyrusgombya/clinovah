@php
  $clinic = \Illuminate\Support\Facades\Auth::guard('clinic')->user();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'Clinic Portal' }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
  <div class="min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="hidden md:flex md:w-64 flex-col bg-white border-r border-gray-200">
      <div class="h-16 flex items-center px-6 border-b border-gray-200">
        <div class="font-semibold text-gray-900 truncate">
          {{ $clinic?->name ?? 'Clinic Portal' }}
        </div>
      </div>

      <nav class="flex-1 px-3 py-4 space-y-1">
        @php
          $item = fn ($active) => $active
            ? 'bg-indigo-50 text-indigo-700 border-indigo-200'
            : 'text-gray-700 hover:bg-gray-50 border-transparent';
          $base = 'group flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium border';
        @endphp

        <a href="{{ route('clinic.dashboard') }}"
           class="{{ $base }} {{ $item(request()->routeIs('clinic.dashboard')) }}">
          <span>Dashboard</span>
        </a>

        <a href="{{ route('clinic.documents') }}"
           class="{{ $base }} {{ $item(request()->routeIs('clinic.documents*')) }}">
          <span>Clinic Documents</span>
        </a>

        <a href="{{ route('clinic.dentists') }}"
           class="{{ $base }} {{ $item(request()->routeIs('clinic.dentists*')) }}">
          <span>Dentists</span>
        </a>

        {{-- Later --}}
        <div class="mt-4 pt-4 border-t border-gray-200">
          <div class="text-xs text-gray-500 px-3">Coming next</div>
          <div class="mt-2 text-xs text-gray-500 px-3">
            Appointments, clinic profile, availability, services
          </div>
        </div>
      </nav>

      <div class="p-4 border-t border-gray-200">
        <form method="POST" action="{{ route('clinic.logout') }}">
          @csrf
          <button type="submit"
                  class="w-full inline-flex justify-center rounded-lg bg-gray-900 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-800">
            Logout
          </button>
        </form>
      </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col">

      {{-- Top bar --}}
      <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-4 sm:px-6">
        <div class="flex items-center gap-3">
          {{-- mobile sidebar hint --}}
          <div class="md:hidden text-sm font-semibold text-gray-900 truncate">
            {{ $clinic?->name ?? 'Clinic Portal' }}
          </div>
          <div class="hidden md:block text-sm text-gray-500">
            {{ $subtitle ?? '' }}
          </div>
        </div>

        <div class="flex items-center gap-3">
          @if($clinic)
            <span class="hidden sm:inline-flex text-xs px-2 py-1 rounded-full
              {{ $clinic->status === 'approved' ? 'bg-emerald-50 text-emerald-700' : 'bg-yellow-50 text-yellow-700' }}">
              {{ strtoupper($clinic->status) }}
            </span>
          @endif
        </div>
      </header>

      {{-- Page content --}}
      <main class="flex-1 p-4 sm:p-6">
        {{ $slot }}
      </main>

    </div>
  </div>
</body>
</html>