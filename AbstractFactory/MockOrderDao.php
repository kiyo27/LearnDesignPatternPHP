<?php
namespace AbstractFactory;

class MockOrderDao implements OrderDao
{
    public function findById($order_id)
    {
        $order = new Order('999');
        $order->addItem(new Item('99', 'ダミー商品'));
        $order->addItem(new Item('99', 'ダミー商品'));
        $order->addItem(new Item('98', 'ダミー商品'));

        return $order;
    }
}