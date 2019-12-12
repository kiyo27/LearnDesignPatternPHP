# Template Method
![img](Template_Method_UML_class_diagram.svg)

## Abstract Class
```php
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
```

## Concrete Class
```php
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
```