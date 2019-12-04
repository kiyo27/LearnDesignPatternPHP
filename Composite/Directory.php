<?php

namespace Composite;

class Directory extends Entry
{
    private $name;

    private $directory = [];

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
        $count = count($this->directory);
        for ($i = 0; $i < $count; $i++) {
            $entry = $this->directory[$i];
            $size += $entry->getSize();
        }
        return $size;
    }

    public function add($entry)
    {
        array_push($this->directory, $entry);
    }

    public function printList($prefix = null)
    {
        echo $prefix . "/" . $this . "\n";
        $count = count($this->directory);
        for ($i = 0; $i < $count; $i++) {
            $entry = $this->directory[$i];
            $entry->printList($prefix . "/" . $this->name);
        }
    }
}