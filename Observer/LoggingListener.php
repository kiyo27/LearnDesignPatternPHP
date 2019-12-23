<?php
namespace Observer;

class LoggingListener implements CartListener
{
    public function __construct()
    {
        //
    }

    public function update(Cart $cart)
    {
        var_dump($cart->getItems());
    }
}