<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BreweriesImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'breweries:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get breweries list and import into shopify store';

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
        //
    }
}
