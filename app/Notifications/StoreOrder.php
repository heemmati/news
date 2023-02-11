<?php

namespace App\Notifications;

use App\Channels\MobileChannel;
use App\Notifications\Messages\SmsMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StoreOrder extends Notification
{
    use Queueable;

    public $order;
    public $abstract;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        //
        $this->order = $order;
        $this->abstract = $order->abstract;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail' , MobileChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toMobile($notifiable)
    {

        $mobile = $notifiable->mobile;
        $order = $this->order;
        $abstract = $this->abstract;
        $message = $this->get_message($order , $abstract);

        return (new SmsMessage())->setRecipient($mobile)->setContent($message);


    }

    public function get_message($order , $abstract)
    {
        $messsage = 'انباردار گرامی';
        $messsage = $messsage . ' ' . '  از کالای ';

        $messsage = $messsage . ' ' . ' ' . $abstract->product->title;


        $messsage = $messsage . ' ' . '  به کد  ';


        $messsage = $messsage . ' ' . ' ' .  $abstract->code ;


        $messsage = $messsage . ' ' . 'انبار  شما به تعداد  ';
        $messsage = $messsage . ' ' . ' ' .  $order->qty ;

        $message = $messsage . ' ' . '    سفارش داده شده است.';


        return $message;

    }

}
