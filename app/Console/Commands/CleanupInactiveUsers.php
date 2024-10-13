<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\InactiveUsersCleanupReport;

class CleanupInactiveUsers extends Command
{
    protected $signature = 'users:cleanup-inactive';
    protected $description = 'Clean up users who haven\'t logged in for more than a year';

    public function handle()
    {
        // Get the date one year ago
        $thresholdDate = Carbon::now()->subYear();

        // Fetch inactive users
        $inactiveUsers = User::where('last_login_at', '<', $thresholdDate)->get();

        // Delete inactive users
        $deletedCount = $inactiveUsers->count();
        if ($deletedCount > 0) {
            User::where('last_login_at', '<', $thresholdDate)->delete();
            Log::info("Deleted $deletedCount inactive users.");

            // Send email summary to admin
            Mail::to('admin@example.com')->send(new InactiveUsersCleanupReport($deletedCount));
        } else {
            Log::info("No inactive users found to delete.");
        }

        $this->info('Cleanup process completed.');
    }
}
