<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentAuthentication extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $studentId;
    protected $name;
    protected $matricule;

    protected $student;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($student)
    {
        $this->studentId = $student['id'];
        $this->name = $student['name'];
        $this->matricule = $student['matricule'];
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
                        'studId'=> $this->studentId,
                        'name' => $this->name,
                        'matricule' => $this->matricule
                    ]);
    }
}
