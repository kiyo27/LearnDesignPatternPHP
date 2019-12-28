# Iterator
![img](Iterator_UML_class_diagram.svg)

## Aggregate

## Concrete Aggregete
```php
<?php
namespace Iterator;

use ArrayObject;
use IteratorAggregate;

class Employees implements IteratorAggregate
{
    private $employees;

    public function __construct()
    {
        $this->employees = new ArrayObject();
    }

    public function add(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function getIterator()
    {
        return $this->employees->getIterator();
    }
}
```

## Iterator

## Concrete Iterator
```php
<?php
namespace Iterator;

use FilterIterator;

class SalesmanIterator extends FilterIterator
{
    public function __construct($iterator)
    {
        parent::__construct($iterator);
    }

    public function accept()
    {
        $employee = $this->current();
        return ($employee->getJob() === 'SALESMAN');
    }
}
```