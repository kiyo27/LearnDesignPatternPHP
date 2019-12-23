<?php

use AbstractFactory\DbFactory;
use AbstractFactory\MockFactory;

require('../vendor/autoload.php');

if (isset($argv[1])) {
    $factory = $argv[1];

    switch ($factory) {
        case 1:
            $factory = new DbFactory;
        break;
        case 2:
            $factory = new MockFactory;
        break;
    }
    $item_id = 1;
    $item_dao = $factory->createItemDao();
    $item = $item_dao->findById($item_id);
    echo 'ID=' . $item_id . 'の商品は「' . $item->getName() . '」です' . "\n";

    $order_id = 3;
    $order_dao = $factory->createOrderDao();
    $order = $order_dao->findById($order_id);
    echo 'ID=' . $order_id . 'の注文情報は次の通りです' . "\n";
    foreach ($order->getItems() as $item) {
        echo $item['object']->getName() . "\n";
    }
}