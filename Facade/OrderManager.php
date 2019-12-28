<?php
namespace Facade;

class OrderManager
{
    public static function order($order)
    {
        $item_dao = ItemDao::getInstance();
        foreach ($order->getItems() as $order_item) {
            $item_dao->setAside($order_item);
        }
        OrderDao::createOrder($order);
    }
}