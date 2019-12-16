# Adapter
継承を使った Adapter
![img](Adapter_using_inheritance_UML_class_diagram.svg)

委譲をつかった Adapter
![img](Adapter_using_delegation_UML_class_diagram.svg)

## Target
```php
<?php
namespace Adapter;

interface DisplaySourceFile
{
    public function display();
}
```

## Adaptee
```php
<?php
namespace Adapter;

use Exception;

class ShowFile
{
    private $filename;

    public function __construct($filename)
    {
        if (!is_readable($filename)) {
            throw new Exception('file "' . $filename . '" is not readable !');
        }
        $this->filename = $filename;
    }

    public function showPlain()
    {
        echo htmlspecialchars(file_get_contents($this->filename), ENT_QUOTES);
    }

    public function showHighlight()
    {
        highlight_file($this->filename);
    }
}
```

## Adapter

継承を使ったパターン
```php
<?php
namespace Adapter;

class DisplaySourceFileImple extends ShowFile implements DisplaySourceFile
{
    public function __construct($filename)
    {
        parent::__construct($filename);
    }

    public function display()
    {
        parent::showHighlight();
    }
}
```

委譲を使ったパターン
```php
<?php
namespace Adapter;

class DisplaySourceFileImpl implements DisplaySourceFile
{
    private $show_file;

    public function __construct($filename)
    {
        $this->show_file = new ShowFile($filename);
    }

    public function display()
    {
        $this->show_file->showHighlight();
    }
}
```