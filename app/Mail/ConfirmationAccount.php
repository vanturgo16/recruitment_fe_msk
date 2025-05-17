<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $link;

    public function __construct($data, $link, $expConfirm)
    {
        $this->data = $data;
        $this->link = $link;
        $this->expConfirm = $expConfirm;
    }

    public function build()
    {
        return $this->view('mail.confirmAccount')->subject("[Notification New User]");
    }
}
