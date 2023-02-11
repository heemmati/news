<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Shop\Traits\PaymentMethods;

class PaymentProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels , PaymentMethods;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $payment;
    protected $order;
    protected $success;
    protected $ref_id;

    public function __construct($payment , $order , $success , $ref_id=null)
    {
        $this->payment = $payment;
        $this->order = $order;
        $this->success = $success;
        $this->ref_id = $ref_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        \App\services\Watch::create_watches(false, [$this->payment->user_id], $this->payment);


        $code = \App\Utility\Shop\Payment::code_generator($this->payment->id);
        if ($this->success) {
            $this->success_pay($this->order, $this->payment, $code, $this->ref_id);
        }
        else {

            $this->fail_pay($this->order, $this->payment, $code);
        }

    }
}
