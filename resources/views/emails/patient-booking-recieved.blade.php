<x-mail::message>

# Booking Request Received

Your booking request has been submitted successfully.

<x-mail::panel>

**Reference:** {{ $appointment->booking_reference }}

**Clinic:** {{ $appointment->clinic?->name ?? 'Clinic' }}

**Date:** {{ $appointment->appointment_at?->format('D, M d Y') }}

**Time:** {{ $appointment->appointment_at?->format('h:i A') }}

**Status:** Pending Confirmation

</x-mail::panel>

The clinic will review your request and confirm the appointment shortly.

<x-mail::button :url="url('/')">
Visit Clinovah
</x-mail::button>

Thanks,<br>
Clinovah

</x-mail::message>