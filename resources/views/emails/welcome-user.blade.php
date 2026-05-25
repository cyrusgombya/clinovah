<x-mail::message>

# Welcome to Clinovah, {{ $user->name }}

Your account has been created successfully.

You can now:

- Browse clinics
- Request appointments
- Track booking updates
- Receive confirmations and reminders

<x-mail::button :url="url('/')">
Visit Clinovah
</x-mail::button>

Thank you for joining Clinovah.

Regards,<br>
Clinovah
</x-mail::message>