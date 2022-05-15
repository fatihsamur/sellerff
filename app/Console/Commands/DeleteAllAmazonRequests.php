<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\AmazonRequest;
use Illuminate\Support\Facades\Log;

class DeleteAllAmazonRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amazonrequestsclear:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        AmazonRequest::truncate();
        Log::info('Daily AmazonRequests cleared');
        $this->info('Daily AmazonRequests cleared');
    }
}
