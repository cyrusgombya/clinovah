<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentCancelledByUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Appointment $appointment) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $a = $this->appointment;

        $when = $a->appointment_at?->format('Y-m-d H:i') ?? '—';

        return (new MailMessage)
            ->subject('Appointment Cancelled by Patient')
            ->greeting("Hello {$notifiable->name},")
            ->line("A patient cancelled an appointment.")
            ->line("Patient: {$a->user->name} ({$a->user->email})")
            ->line("Date & Time: {$when}")
            ->line("Reason: {$a->cancellation_reason}")
            ->when(!empty($a->cancellation_note), function (MailMessage $m) use ($a) {
                return $m->line("Note: {$a->cancellation_note}");
            })
            ->action('Open clinic portal', route('clinic.appointments.index'));
    }
}