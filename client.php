<?php

use Observer\Cart;
use Observer\LoggingListener;
use Observer\PresentListener;

require('vendor/autoload.php');

function createCart()
{
    $cart = new Cart;
    $cart->addListener(new PresentListener);
    $cart->addListener(new LoggingListener);
    return $cart;
}

$cart = createCart();

$cart->addItem('クッキーセット');
$cart->addItem('抹茶セット');

$cart->removeItem('クッキーセット');

foreach ($cart->getItems() as $item_name => $quantity) {
    echo $item_name . $quantity . "\n";
}