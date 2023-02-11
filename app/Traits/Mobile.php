<?php


namespace App\Traits;


use App\Utility\Acl;
use Kavenegar\KavenegarApi;

trait Mobile
{
    protected $sender = "100008544";
    protected $api = "6D4B41753237592F747337353676637674674F4E674D5877584A3665396676624E683758395632547A41493D";


    /**
     * Send SMS VIA MOBILE NUMBER
     * @param $mobile
     * @param $message
     */
    public function send_sms($mobile, $message)
    {
        $this->send_sms_config($this->sender, $mobile, $message, $this->api);
    }

    /**
     * @param $sender
     * @param $mobile
     * @param $message
     * @param $api
     */
    public function send_sms_config($sender, $mobile, $message, $api)
    {
        $receptor = $mobile;
        $api = new KavenegarApi($api);
        $api->Send($sender, $receptor, $message);

    }

    /**
     * @param $role
     * @param $name
     * @param $message
     * @return string
     */
    public function message_generator($role, $name, $message)
    {

        /* Get The Full Name Via Role */
        $name = $this->name_generator_via_role($role, $name);


        $message = $name . ' ' . $message;
        return $message;

    }

    /**
     * @param $role
     * @param $name
     * @return string
     */
    public function name_generator_via_role($role, $name)
    {
        switch ($role) {
            case Acl::WHOLESALER :
                $name = $this->wholesale_name($name);
                break;
            case Acl::HOMER :
                $name = $this->homer_name($name);
                break;
            case Acl::ADMIN :
            case Acl::FINANCIAL :
                $name = $this->manager_name($name);
                break;
            default :
                $name = $this->buyer_name($name);

        }
        return $name;
    }

    /**
     * @param $name
     * @return string
     */
    public function wholesale_name($name)
    {
        $customer_name = 'بنکدار گرامی ، آقا/خانم ';
        return $this->name_generator($customer_name, $name);

    }

    /**
     * @param $type
     * @param $name
     * @return string
     */
    public function name_generator($type, $name)
    {
        $customer_name = $type . $name . ' ';
        return $customer_name;
    }

    /**
     * @param $name
     * @return string
     */
    public function homer_name($name)
    {
        $customer_name = 'فروشنده گرامی ، آقا/خانم ';
        return $this->name_generator($customer_name, $name);

    }

    /**
     * @param $name
     * @return string
     */
    public function manager_name($name)
    {
        $customer_name = 'مدیر  گرامی ، آقا/خانم ';
        return $this->name_generator($customer_name, $name);

    }

    /**
     * @param $name
     * @return string
     */
    public function buyer_name($name)
    {
        $customer_name = 'خریدار  گرامی ، آقا/خانم ';
        return $this->name_generator($customer_name, $name);

    }


}
