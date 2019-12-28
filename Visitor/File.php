<?php

namespace Visitor;

class File extends Entry
{
    private $name;

    private $size;

    public function __construct($name, $size)
    {
        $this->name = $name;
        $this->size = $size;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function accept($v)
    {
        $v->visit($this);
    }
}