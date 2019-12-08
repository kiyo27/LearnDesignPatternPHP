<?php

require('vendor/autoload.php');

use Facade\Order;
use Facade\OrderItem;
use Facade\ItemDao;
use Facade\OrderManager;

$order = new Order();
$item_dao = ItemDao::getInstance();

$order->addItem(new OrderItem($item_dao->findById(1), 2));
$order->addItem(new OrderItem($item_dao->findById(2), 1));
$order->addItem(new OrderItem($item_dao->findById(3), 3));

OrderManager::order($order);