<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\StudentAuthentication;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $student;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($student)
    {
        // assigning email and ids of student as job members
        $this->email = $student->email;
        $this->student = [
            "verification_code" => $student->verification_code,
            "name" => $student->name,
            "matricule" => $student->matricule
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new StudentAuthentication($this->student));
    }
}
