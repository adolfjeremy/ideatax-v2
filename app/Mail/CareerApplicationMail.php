<?php

namespace App\Mail;

use Storage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CareerApplicationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $position;
    public $email;
    public $phone;
    public $coverLetter;
    public $resume;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $position, $email, $phone, $coverLetter, $resume)
    {
        $this->name = $name;
        $this->position = $position;
        $this->email = $email;
        $this->phone = $phone;
        $this->coverLetter = $coverLetter;
        $this->resume = $resume;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file = asset(`storage/$this->resume`);
        return $this->view('pages.applicantMailView')
                    ->subject("(NO REPLY) Job application - ($this->position)");
    }
}
