<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $abstract;
    protected $order;

    public function __construct($order)
    {
        //
        $this->abstract = $order->abstract;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->order;
        $abstract = $this->abstract;
        return $this->view('mail.customorder' , compact('order' , 'abstract'));
    }
}
