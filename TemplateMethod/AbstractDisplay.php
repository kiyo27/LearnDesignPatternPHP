<?php
namespace TemplateMethod;

abstract class AbstractDisplay
{
    private $data;

    public function __construct($data)
    {
        if (!is_array($$data)) {
            $data = array($data);
        }
        $this->data = $data;
    }

    public function display()
    {
        $this->displayHeader();
        $this->displayBody();
        $this->displayFooter();
    }

    public function getData()
    {
        return $this->data;
    }

    protected abstract function displayHeader();

    protected abstract function displayBody();

    protected abstract function displayFooter();
}