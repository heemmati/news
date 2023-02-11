<?php


namespace App\Payam;


class ToastPayam implements Payam
{

    public function success($message = null, $callback = null)
    {
        if (isset($message) && !empty($message)) {
            toast($message, 'success');
        } else {
            toast(__('site.done'), 'success');
        }

        if (isset($callback) && !empty($callback)) {
            return $callback;
        } else {
            return back();
        }

    }

    public function error($message = null, $callback = null)
    {
        if (isset($message) && !empty($message)) {
            toast($message, 'error');
        } else {
            toast(__('site.try_minute_later'), 'error');
        }

        if (isset($callback) && !empty($callback)) {
            return $callback;
        } else {
            return back();
        }


    }

    public function custom()
    {
        // TODO: Implement custom() method.
    }
}
