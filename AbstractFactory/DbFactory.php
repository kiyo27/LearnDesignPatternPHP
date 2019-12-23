<?php
namespace AbstractFactory;

class DbFactory implements DaoFactory
{
    public function createItemDao()
    {
        return new DbItemDao();
    }

    public function createOrderDao()
    {
        return new DbOrderDao($this->createItemDao());
    }
}