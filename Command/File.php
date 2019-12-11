<?php
namespace Command;

class File
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function decompress()
    {
        echo $this->name . "を展開しました\n";
    }

    public function compress()
    {
        echo $this->name . "を圧縮しました\n";
    }

    public function create()
    {
        echo $this->name . "を作成しました\n";
    }
}