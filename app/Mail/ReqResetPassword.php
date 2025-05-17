<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReqResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $link;

    public function __construct($data, $link)
    {
        $this->data = $data;
        $this->link = $link;
    }

    public function build()
    {
        return $this->view('mail.reqResetPassword')->subject("[Notification Permintaan Atur Ulang Password]");
    }
}
