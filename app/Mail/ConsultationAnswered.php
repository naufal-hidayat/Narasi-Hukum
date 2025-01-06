<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultationAnswered extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.consultation_answered')
                    ->from('no-reply@narasihukum.id', 'Tim Konsultasi NarasiHukum')  // Ganti alamat dengan no-reply
                    ->subject('Pertanyaan Anda Sudah Dijawab')
                    ->with('data', $this->data);
    }
}
