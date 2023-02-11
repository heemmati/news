<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StoreOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $abstract;
    public function __construct($order)
    {
        //
        $this->order = $order;
        $this->abstract = $order->abstract;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $abstract = $this->abstract;
        $order = $this->order;

        return $this->view('mail.storeorder' , compact('abstract' , 'order'));
    }
}
