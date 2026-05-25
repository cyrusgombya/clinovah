<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    public Appointment $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function build()
    {
        return $this
            ->subject('Your Appointment Has Been Confirmed')
            ->html($this->renderHtml());
    }

    protected function renderHtml(): string
    {
        $a = $this->appointment;

        return "
        <div style='font-family:Arial,sans-serif;background:#f3fbf7;padding:32px;'>
            <div style='max-width:620px;margin:auto;background:#ffffff;border-radius:24px;padding:34px;box-shadow:0 20px 60px rgba(14,82,63,0.08);'>

                <div style='text-align:center;margin-bottom:24px;'>
                    <img src='" . url('/assets/clin/images/logo/clinovah.png') . "' alt='Clinovah' style='max-width:180px;height:auto;'>
                </div>

                <h2 style='color:#0e523f;margin-bottom:12px;'>Appointment Confirmed</h2>

                <p style='color:#40574f;line-height:1.7;'>
                    Your appointment at <strong>" . ($a->clinic?->name ?? 'Clinic') . "</strong> has been confirmed.
                </p>

                <div style='background:#f3fbf7;padding:18px;border-radius:14px;margin:20px 0;color:#12332a;'>
                    <p><strong>Reference:</strong> {$a->booking_reference}</p>
                    <p><strong>Clinic:</strong> " . ($a->clinic?->name ?? 'Clinic') . "</p>
                    <p><strong>Date:</strong> " . $a->appointment_at?->format('D, M d Y') . "</p>
                    <p><strong>Time:</strong> " . $a->appointment_at?->format('h:i A') . "</p>
                    <p><strong>Specialist:</strong> " . ($a->dentist?->full_name ?? 'Any available specialist') . "</p>
                    <p><strong>Status:</strong> Confirmed</p>
                </div>

                <p style='color:#40574f;line-height:1.7;'>
                    Please arrive at least 10 minutes early.
                </p>

                <p style='margin-top:30px;color:#64748b;font-size:14px;'>
                    Clinovah
                </p>
            </div>
        </div>";
    }
}