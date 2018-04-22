<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'janeexampexample@example.com';
        $subject = 'This is a demo!';
        $name = 'Jane Doe';
        $data = ['message' => 'This is a test!'];


          return $this->view('welcome-mail')
                    ->from($address, $name)
                    ->cc("siddarth.rait@gmail.com", $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'message' => $data['message'] ]);
    }
}
