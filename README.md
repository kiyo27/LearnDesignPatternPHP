# Composite

![img](./Composite_UML_class_diagram.svg)

# Component

```php
<?php

namespace Composite;

use RuntimeException;

abstract class Entry
{
    public abstract function getName();

    public abstract function getSize();

    public function add($entry)
    {
        throw new RuntimeException();
    }

    public abstract function printList($prefix = null);
    
    public function __toString()
    {
        return $this->getName() . " (" . $this->getSize() . ") ";
    }
}
```

## Leaf

```php
<?php

namespace Composite;

class File extends Entry
{
    private $name;

    private $size;

    public function __construct($name, $size)
    {
        $this->name = $name;
        $this->size = $size;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function printList($prefix = null)
    {
        echo $prefix . "/" . $this . "\n";
    }
}
```

## Composite

```php
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
```