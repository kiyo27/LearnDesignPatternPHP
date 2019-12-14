<?php
namespace AbstractFactory;

interface DaoFactory
{
    public function createItemDao();

    public function createOrderDao();
}