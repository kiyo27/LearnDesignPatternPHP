<?php

namespace Visitor;

abstract class Entry implements Element
{
    public abstract function getName();

    public abstract function getSize();

    public function iterator()
    {
        throw new Exception();
    }

    public function __toString()
    {
        return $this->getName() . "(" . $this->getSize() . ")";
    }
}