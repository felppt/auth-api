<?php

namespace App\Console\Commands;

use App\Http\Controllers\TestController;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute TestController';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        TestController::execute();
    }
}
