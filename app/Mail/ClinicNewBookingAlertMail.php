<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClinicNewBookingAlertMail extends Mailable
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
            ->subject('New Appointment Booking')
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

                <h2 style='color:#0e523f;margin-bottom:12px;'>New Booking Received</h2>

                <p style='color:#40574f;line-height:1.7;'>
                    A new appointment request has been submitted for your clinic.
                </p>

                <div style='background:#f3fbf7;padding:18px;border-radius:14px;margin:20px 0;color:#12332a;'>
                    <p><strong>Reference:</strong> {$a->booking_reference}</p>
                    <p><strong>Patient:</strong> " . ($a->patient_name ?? 'Patient') . "</p>
                    <p><strong>Email:</strong> " . ($a->patient_email ?? 'Not provided') . "</p>
                    <p><strong>Phone:</strong> " . ($a->patient_phone ?? 'Not provided') . "</p>
                    <p><strong>Date:</strong> " . $a->appointment_at?->format('D, M d Y') . "</p>
                    <p><strong>Time:</strong> " . $a->appointment_at?->format('h:i A') . "</p>
                    <p><strong>Service:</strong> " . ($a->service ?: 'General consultation') . "</p>
                </div>

                <p style='color:#40574f;line-height:1.7;'>
                    Please log into the clinic dashboard to review and confirm this booking.
                </p>

                <p style='margin-top:30px;color:#64748b;font-size:14px;'>
                    Clinovah
                </p>
            </div>
        </div>";
    }
}