<x-mail::message>

# New Booking Received

A new appointment request has been submitted.

<x-mail::panel>

**Reference:** {{ $appointment->booking_reference }}

**Patient:** {{ $appointment->patient_name ?? 'Patient' }}

**Date:** {{ $appointment->appointment_at?->format('D, M d Y') }}

**Time:** {{ $appointment->appointment_at?->format('h:i A') }}

**Service:** {{ $appointment->service ?: 'General consultation' }}

</x-mail::panel>

Please log into the clinic dashboard to review the booking.

<x-mail::button :url="url('/clinic/login')">
Open Dashboard
</x-mail::button>

Clinovah

</x-mail::message>