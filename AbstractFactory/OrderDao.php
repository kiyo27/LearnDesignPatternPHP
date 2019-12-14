<?php
namespace AbstractFactory;

interface OrderDao
{
    public function findById($order_id);
}