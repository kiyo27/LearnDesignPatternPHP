# Factory
![img](Factory_Method_UML_class_diagram.svg)

## Creator
```php
<?php
namespace Factory;

class ReaderFactory
{
    public function create($filename)
    {
        $reader = $this->createReader($filename);
        return $reader;
    }

    private function createReader($filename)
    {
        $poscsv = stripos($filename, '.csv');
        $posxml = stripos($filename, '.xml');
        if ($poscsv !== false) {
            $r = new CSVFileReader($filename);
            return $r;
        } else if ($posxml !== false) {
            return new XMLFileReader($filename);
        } else {
            die('This filename is not supported : ' . $filename);
        }
    }
}
```

## Product
```php
<?php
namespace Factory;

interface Reader
{
    public function read();

    public function display();
}
```

## Concrete Product
```php
<?php
namespace Factory;

use Exception;

class XMLFileReader implements Reader
{
    private $filename;

    private $handler;

    public function __construct($filename)
    {
        if (!is_readable($filename)) {
            throw new Exception('file [' . $filename . '] is not readable.');
        }
        $this->filename = $filename;
    }

    public function read()
    {
        $this->handler = simplexml_load_file($this->filename);
    }

    private function convert($str)
    {
        return mb_convert_encoding($str, 'UTF-8', 'auto');
    }

    public function display()
    {
        foreach ($this->handler->artist as $artist) {
            echo $this->convert($artist['name']) . "\n";
            foreach ($artist->music as $music) {
                echo "  " .$this->convert($music['name']) . "\n";
            }
        }
    }
}
```

