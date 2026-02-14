<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $resetUrl;

    public function __construct(User $user, $resetUrl)
    {
        $this->user = $user;
        $this->resetUrl = $resetUrl;
    }

    public function build()
    {
        return $this->subject('Password Reset Link')
                    ->html('
                        <p>Hello '.$this->user->name.',</p>
                        <p>You requested a password reset. Click the button below to reset your password:</p>
                        <p style="text-align:center;">
                            <a href="'.$this->resetUrl.'" style="
                                background-color:#4F46E5;
                                color:white;
                                padding:12px 24px;
                                border-radius:6px;
                                text-decoration:none;
                                font-weight:bold;
                                display:inline-block;
                            ">Reset Password</a>
                        </p>
                        <p>If you did not request this, no further action is required.</p>
                        <p>Thank you.</p>
                    ');
    }
}
