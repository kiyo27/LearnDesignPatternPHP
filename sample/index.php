<?php

abstract class Entry {
    abstract public function getName();
    abstract public function getSize();

    public function add($entry) {
        throw new Exception();
    }

    abstract public function printList($prefix = null);

    public function toString() {
        return getName() . " (" . getSize() . ")";
    }
}

class File extends Entry {
    private $name;
    private $size;

    public function __construct($name, $size) {
        $this->name = $name;
        $this->size = $size;
    }

    public function getName() {
        return $this->name;
    }

    public function getSize() {
        return $this->size;
    }

    public function printList($prefix = null) {
        echo $prefix . "/" . $this->name;
        echo "<br>";
    }
}


class Composite extends Entry {
    private $name;
    private $directory = array();

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return  $this->name;
    }

    public function getSize() {
        $size = 0;
        foreach ($this->directory as $entry) {
            $size = $entry->getSize();
        }
        return $size;
    }

    public function add($entry) {
        $this->directory[] = $entry;
        return $this;
    }

    public function printList($prefix = null) {
        echo $prefix . "/" . $this->name;
        echo "<br>";
        foreach ($this->directory as $entry) {
            $entry->printList($prefix . "/" . $this->name);
        }
    }
}


$rootdir = new Composite("root");
$bindir = new Composite("bin");
$tmpdir = new Composite("tmp");
$usrdir = new Composite("usr");

$rootdir->add($bindir);
$rootdir->add($tmpdir);

$bindir->add(new File("vi", 10000));
$rootdir->printList();
