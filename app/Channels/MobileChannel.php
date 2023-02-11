<?php


namespace App\Channels;


use App\Traits\Mobile;
use Illuminate\Notifications\Notification;

class MobileChannel
{
    use Mobile;
    public function send($notifiable, Notification $notification){
        $message = $notification->toMobile($notifiable);

//
//        return (new SmsMessage())->sendSms(
//            $message->getRecipient(),
//            $message->getContent()
//        );
        $this->send_sms($message->getRecipient() , $message->getContent());


    }
}
