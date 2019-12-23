# AbstractFactory
![img](Abstract_Factory_UML_class_diagram.svg)

## AbstractFactory
```php
<?php
namespace AbstractFactory;

interface DaoFactory
{
    public function createItemDao();

    public function createOrderDao();
}
```

## ConcreteFactory
```php
<?php
namespace AbstractFactory;

class DbFactory implements DaoFactory
{
    public function createItemDao()
    {
        return new DbItemDao();
    }

    public function createOrderDao()
    {
        return new DbOrderDao($this->createItemDao());
    }
}
```

## ProductA
```php
<?php
namespace AbstractFactory;

interface ItemDao
{
    public function findById($item_id);
}
```

## ConcreteProductA
```php
<?php
namespace AbstractFactory;

class DbItemDao implements ItemDao
{
    private $items;

    public function __construct()
    {
        $fp = fopen('item_data.txt', 'r');

        $dummy = fgets($fp, 4096);

        $this->items = [];
        while ($buffer = fgets($fp, 4096)) {
            $item_id = trim(substr($buffer, 0, 10));
            $item_name = trim(substr($buffer, 10));

            $item = new Item($item_id, $item_name);
            $this->items[$item->getId()] = $item;
        }
        fclose($fp);
    }

    public function findById($item_id)
    {
        if (array_key_exists($item_id, $this->items)) {
            return $this->items[$item_id];
        } else {
            return null;
        }
    }
}
```

## ProductB
```php
<?php
namespace AbstractFactory;

interface OrderDao
{
    public function findById($order_id);
}
```

## ConcreteProductB
```php
<?php
namespace AbstractFactory;

class DbOrderDao implements OrderDao
{
    private $orders;

    public function __construct(ItemDao $item_dao)
    {
        $fp = fopen('order_data.txt', 'r');

        $dummy = fgets($fp, 4096);

        $this->orders = [];
        while ($buffer = fgets($fp, 4096)) {
            $order_id = trim(substr($buffer, 0, 10));
            $item_ids = trim(substr($buffer, 10));
            
            $order = new Order($order_id);
            foreach (explode(',', $item_ids) as $item_id) {
                $item = $item_dao->findById($item_id);
                if (!is_null($item)) {
                    $order->addItem($item);
                }
            }
            $this->orders[$order->getId()] = $order;
        }
        fclose($fp);
    }

    public function findById($order_id)
    {
        if (array_key_exists($order_id, $this->orders)) {
            return $this->orders[$order_id];
        } else {
            return null;
        }
    }
}
```