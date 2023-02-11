<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Shop\Traits\Shipping;

class OrderCreation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Shipping;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $order;

    public function __construct($order)
    {
        //
        $this->order = $order ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        // Create Shipping Data
        $order = $this->order;
         $this->store_shipping_via_order($order);
    }
}
