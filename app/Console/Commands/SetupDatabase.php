<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the chain of commands needed to setup a local development database.';

    /**
     * Execute the console command.
     */
    public function handle()
    { 
        $this->call('migrate:fresh');
        $this->call('db:seed');
    }
}