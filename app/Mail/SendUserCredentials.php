<?php

// namespace App\Mail;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
// use Illuminate\Queue\SerializesModels;

// class SendUserCredentials extends Mailable
// {
//     use Queueable, SerializesModels;

//     public function __construct()
//     {
   
//     }


//     public function envelope(): Envelope
//     {
//         return new Envelope(
//             subject: 'Send User Credentials',
//         );
//     }

//     public function content(): Content
//     {
//         return new Content(
//             view: 'view.name',
//         );
//     }


//     public function attachments(): array
//     {
//         return [];
//     }
// }

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUserCredentials extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Your Account Credentials')
            ->view('emails.user-credentials')
            ->with([
                'email' => $this->email,
                'password' => $this->password,
            ]);
    }
}
