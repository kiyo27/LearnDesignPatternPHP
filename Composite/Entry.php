<?php

namespace Composite;

use RuntimeException;

abstract class Entry
{
    public abstract function getName();

    public abstract function getSize();

    public function add($entry)
    {
        throw new RuntimeException();
    }

    public abstract function printList($prefix = null);
    
    public function __toString()
    {
        return $this->getName() . " (" . $this->getSize() . ") ";
    }
}