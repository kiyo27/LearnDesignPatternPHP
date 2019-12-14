<?php
namespace AbstractFactory;

interface ItemDao
{
    public function findById($item_id);
}