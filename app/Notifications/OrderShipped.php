<?php

namespace App\Notifications;

use App\Channels\MobileChannel;
use App\Notifications\Messages\SmsMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderShipped extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {

        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail' , MobileChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
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
     * @param mixed $notifiable
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
        $message = $this->get_message($order);

        return (new SmsMessage())->setRecipient($mobile)->setContent($message);


    }

    public function get_message($order )
    {
        $messsage = 'سفارش شما با موفقیت ثبت شد!';
        $messsage = $messsage . ' ' . '   کد رهگیری : ';

        $messsage = $messsage . ' ' . ' ' . $order->code;


        return $messsage;

    }

}
