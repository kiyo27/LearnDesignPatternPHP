<?php
namespace TemplateMethod;

class TableDisplay extends AbstractDisplay
{
    protected function displayHeader()
    {
        echo "Table Header";
    }

    protected function displayBody()
    {
        foreach($this->getData() as $key => $value) {
            echo $key . "\n";
            echo $value . "\n";
        }
    }

    protected function displayFooter()
    {
        echo "Table Footer";
    }
}