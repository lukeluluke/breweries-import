<?php

namespace App\Console\Commands;

use App\Brewery\Brewery;
use App\Jobs\InsertBreweryToShopify;
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
    public function handle(Brewery $brewery)
    {
        try {
            $breweries =  $brewery->getBreweryList();
            foreach ($breweries as $brewery) {
                InsertBreweryToShopify::dispatch(json_encode($brewery));
            }
        } catch (\Exception $exception) {

            echo $exception->getMessage();
        }

    }
}
