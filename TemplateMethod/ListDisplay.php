<?php
namespace TemplateMethod;

class ListDisplay extends AbstractDisplay
{
    protected function displayHeader()
    {
        echo "Header";
    }

    protected function displayBody()
    {
        foreach ($this->getData() as $key => $value) {
            echo "Item" . $key . "\n";
            echo $value . "\n";
        }
    }

    protected function displayFooter()
    {
        echo "Footer";
    }
}