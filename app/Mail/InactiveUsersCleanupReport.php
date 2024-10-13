<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InactiveUsersCleanupReport extends Mailable
{
    use Queueable, SerializesModels;

    public $deletedCount;

    public function __construct($deletedCount)
    {
        $this->deletedCount = $deletedCount;
    }

    public function build()
    {
        return $this->subject('Inactive Users Cleanup Report')
                    ->view('emails.inactive_users_cleanup_report')
                    ->with(['deletedCount' => $this->deletedCount]);
    }
}
