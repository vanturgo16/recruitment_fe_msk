<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectEducation extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $maxEduCandidate;
    public $nameApplied;

    public function __construct($data, $maxEduCandidate, $nameApplied)
    {
        $this->data = $data;
        $this->maxEduCandidate = $maxEduCandidate;
        $this->nameApplied = $nameApplied;
    }

    public function build()
    {
        return $this->view('mail.rejectEducation')->subject("[Informasi Lamaran]");
    }
}
