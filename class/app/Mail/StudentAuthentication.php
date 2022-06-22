<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentAuthentication extends Mailable
{
    use Queueable, SerializesModels;

    protected $studentId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('laravel@example.com', 'Mailtrap')
                    ->view('emails.newStudent')
                    ->with('studId', $this->studentId);
    }
}
