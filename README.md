# Memento

![img](Memento_design_pattern.png)

## Originator
```php
<?php
namespace Memento;

class Data extends DataSnapshot
{
    private $comment;

    public function __construct()
    {
        $this->comment = [];
    }

    public function takeSnapshot()
    {
        return new DataSnapshot($this->comment);
    }

    public function restoreSnapshot(DataSnapshot $snapshot)
    {
        $this->comment = $snapshot->getComment();
    }

    public function addComment($comment)
    {
        $this->comment[] = $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }
}
```

## Memento
```php
<?php
namespace Memento;

class DataSnapshot
{
    private $comment;

    protected function __construct($comment)
    {
        $this->comment = $comment;
    }

    protected function getComment()
    {
        return $this->comment;
    }
}
```

## Caretaker
```php
<?php
namespace Memento;

class DataCaretaker
{
    private $snapshot;
    
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function setSnapshot($snapshot)
    {
        $this->snapshot = $snapshot;
        $_SESSION['snapshot'] = $this->snapshot;
    }

    public function getSnapshot()
    {
        return (isset($_SESSION['snapshot']) ? $_SESSION['snapshot'] : null);
    }
}
```