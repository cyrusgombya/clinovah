<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentConfirmedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Appointment $appointment) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $a = $this->appointment->loadMissing(['clinic', 'dentist']);

        $when = $a->appointment_at?->format('Y-m-d H:i') ?? '—';
        $dentist = $a->dentist?->full_name ?? 'Any available dentist';

        return (new MailMessage)
            ->subject('Appointment Confirmed')
            ->greeting("Hello {$notifiable->name},")
            ->line("Good news — your appointment has been confirmed.")
            ->line("Clinic: {$a->clinic->name}")
            ->line("Dentist: {$dentist}")
            ->line("Date & Time: {$when}")
            ->action('View your appointments', route('dashboard.appointments'));
    }
}