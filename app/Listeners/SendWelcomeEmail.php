<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class SendWelcomeEmail
{
    public function handle(UserRegistered $event)
    {
        // Send the email using the Mail facade
        Mail::to($event->user->email)->send(new WelcomeEmail($event->user));
    }
}
