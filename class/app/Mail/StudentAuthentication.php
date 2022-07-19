<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentAuthentication extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $name;
    protected $matricule;
    protected $verification_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($student)
    {
        $this->name = $student['name'];
        $this->matricule = $student['matricule'];
        $this->verification_code = $student['verification_code'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('schule@school.com', 'Mailtrap')
                    ->view('emails.newStudent')
                    ->with([
                        'name' => $this->name,
                        'matricule' => $this->matricule,
                        'verification_code' => $this->verification_code
                    ]);
    }
}
