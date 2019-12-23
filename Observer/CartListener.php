<?php
namespace Observer;

interface CartListener
{
    public function update(Cart $cart);
}