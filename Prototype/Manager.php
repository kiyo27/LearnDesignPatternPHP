<?php

namespace Prototype;

use Prototype\Product;

class Manager
{
    private $showcase;

    public function register($name, Product $proto)
    {
        $this->showcase[$name] = $proto;
    }

    public function create($protoname)
    {
        $p = $this->showcase[$protoname];
        return $p->createClone();
    }
}