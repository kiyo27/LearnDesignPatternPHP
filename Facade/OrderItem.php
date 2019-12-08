<?php
namespace Facade;

class OrderItem
{
    private $item;

    private $amount;

    public function __construct($item, $amount)
    {
        $this->item = $item;
        $this->amount = $amount;
    }

    public function getItem()
    {
        return $this->item;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}