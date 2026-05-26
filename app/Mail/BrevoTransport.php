<?php

namespace App\Mail;

use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mime\Email;

class BrevoTransport extends AbstractTransport
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        parent::__construct();
    }

    protected function doSend(SentMessage $message): void
    {
        $email = $message->getOriginalMessage();

        $to = [];
        foreach ($email->getTo() as $address) {
            $to[] = [
                'name' => $address->getName(),
                'email' => $address->getAddress(),
            ];
        }

        $payload = [
            'sender' => [
                'name' => $email->getFrom()[0]->getName() ?? 'Clinovah',
                'email' => $email->getFrom()[0]->getAddress(),
            ],
            'to' => $to,
            'subject' => $email->getSubject(),
            'htmlContent' => $email->getHtmlBody(),
        ];

        if ($email->getTextBody()) {
            $payload['textContent'] = $email->getTextBody();
        }

        $response = \Illuminate\Support\Facades\Http::withHeaders([
            'api-key' => $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', $payload);

        if ($response->failed()) {
            throw new \Exception('Brevo API Error: ' . $response->body());
        }
    }

    public function __toString(): string
    {
        return 'brevo';
    }
}
