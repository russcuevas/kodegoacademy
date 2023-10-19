<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $resetLink;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $resetLink
     */
    public function __construct($name, $resetLink)
    {
        $this->name = $name;
        $this->resetLink = $resetLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('page.reset_password')
            ->subject('Reset Password')
            ->with([
                'name' => $this->name,
                'resetLink' => $this->resetLink,
            ]);
    }
}
