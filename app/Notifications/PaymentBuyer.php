<?php

namespace App\Notifications;

use App\Channels\MobileChannel;
use App\Notifications\Messages\SmsMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentBuyer extends Notification
{
    use Queueable;

    public $payment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($payment)
    {
        //
        $this->payment = $payment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', MobileChannel::class];
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

    public function toMobile($notifiable)
    {

        $mobile = $notifiable->mobile;
        $payment = $this->payment;
        $message = $this->get_message($payment);

        return (new SmsMessage())->setRecipient($mobile)->setContent($message);


    }

    public function get_message($payment)
    {
        $messsage = 'خریدار گرامی';
        $messsage = $messsage . ' ' . ' پرداخت شما در سیستم به مبلغ';
        $messsage = $messsage . ' ' . ' ' . $payment->total;

        if ($payment->status == \App\Utility\Shop\Payment::SUCCESS) {
            $messsage = $messsage . ' ' . 'موفقیت آمیز بود!';
        } else {
            $messsage = $messsage . ' ' . 'ناموفق بود!';
        }
        $message = $messsage . ' ' . 'کد پیگیری :';

        $message = $messsage . ' ' . $payment->code;


        return $message;

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
}
