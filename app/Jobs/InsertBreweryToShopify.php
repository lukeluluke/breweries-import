<?php

namespace App\Jobs;

use App\ShopifyStore\ShopifyStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InsertBreweryToShopify implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $brewery;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($brewery)
    {
        $this->brewery = $brewery;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ShopifyStore $shopifyStore)
    {
        //
        $shopifyStore->addProduct($this->brewery);
    }
}
