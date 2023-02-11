<?php


namespace App\Payam;


class PayamFactory
{

    private $type;

    public function __construct($type = PayamType::TOAST)
    {

        $this->type = $type;

    }

    public function go()
    {
        if (isset($this->type) && !empty($this->type)) {
            switch ($this->type) {
                case(PayamType::TOAST):
                    return new ToastPayam();
                    break;
                case(PayamType::ALERT):
                    return new AlertPayam();
                    break;
                default:
                    return new ToastPayam();
            }
        } else {
            return new ToastPayam();
        }
    }
}
