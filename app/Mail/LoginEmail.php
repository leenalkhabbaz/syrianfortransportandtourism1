<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class LoginEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $receiver ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiver)
    {
        $this->receiver = Hash::make($receiver) ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("m.jawad.focusco@gmail.com")->view('verify');
    }
}
