<?php

namespace Visitor;

class Directory extends Entry
{
    private $name;

    private $dir = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSize()
    {
        $size = 0;
        foreach($this->dir as $dir) {
            $size += $dir->getSize();
        }
        return $size;
    }

    public function add($entry)
    {
        $this->dir[] = $entry;
        return $this;
    }

    public function iterator()
    {
        return $this->dir;
    }

    public function accept($v)
    {
        $v->visit($this);
    }
}