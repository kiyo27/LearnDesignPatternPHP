# Flyweight
![img](Flyweight_UML_class_diagram.svg)

## FlyweightFactory
```php
<?php
namespace Flyweight;

use RuntimeException;

class ItemFactory
{
    private $pool;

    private static $instance;

    private function __construct($filename)
    {
        $this->buildPool($filename);
    }

    public static function getInstance($filename)
    {
        if (is_null(self::$instance)) {
            self::$instance = new ItemFactory($filename);
        }
        return self::$instance;
    }

    public function getItem($code)
    {
        if (array_key_exists($code, $this->pool)) {
            return $this->pool[$code];
        } else {
            return null;
        }
    }

    private function buildPool($filename)
    {
        $this->pool = [];
        $fp = fopen($filename, 'r');
        while ($buffer = fgets($fp, 4096)) {
            list($item_code, $item_name, $price) = explode(",", $buffer);
            $this->pool[$item_code] = new Item($item_code, $item_name, $price);
        }
        fclose($fp);
    }

    public final function __close()
    {
        throw new RuntimeException("clone is not allowed against " . get_class($this));
    }
}
```

## Flyweight
```php
<?php
namespace Flyweight;

class Item
{
    private $code;

    private $name;

    private $price;

    public function __construct($code, $name, $price)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
```