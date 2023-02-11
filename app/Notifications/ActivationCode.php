<?php

namespace App\Notifications;

use App\Channels\MobileChannel;
use App\Notifications\Messages\SmsMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActivationCode extends Notification
{
    use Queueable;

    public $code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        //
        $this->code = $code;
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


        $mobile = $notifiable->routes;
        if (isset($mobile) && !empty($mobile)) {
            $mobile = $notifiable->routes[MobileChannel::class];
        } else {
            $mobile = $notifiable->mobile;
        }
        $code = $this->code;


        $code_message = 'Code :';



        return (new SmsMessage())->setRecipient($mobile)->setContent($code_message . $code);




    }

    public function toArray($notifiable)
    {
        return [
            'code' => $this->code,
        ];
    }


}
