# Command
![img](Command_Design_Pattern_Class_Diagram.png)

## Command
```php
<?php
namespace Command;

interface Command
{
    public function execute();
}
```

## ConcreteCommand
```php
<?php
namespace Command;

class CompressCommand implements Command
{
    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function execute()
    {
        $this->file->compress();
    }
}
```

## Invoker
```php
<?php
namespace Command;

class Queue
{
    private $commands;

    private $current_index;

    public function __construct()
    {
        $this->commands = [];
        $this->current_index = 0;
    }

    public function addCommand(Command $command)
    {
        $this->commands[] = $command;
    }

    public function run()
    {
        while (!is_null($command = $this->next())) {
            $command->execute();
        }
    }

    private function next()
    {
        if (count($this->commands) === 0 || count($this->commands) <= $this->current_index) {
            return null;
        } else {
            return $this->commands[$this->current_index++];
        }
    }
}
```

## Receiver
```php
<?php
namespace Command;

class File
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function decompress()
    {
        echo $this->name . "を展開しました\n";
    }

    public function compress()
    {
        echo $this->name . "を圧縮しました\n";
    }

    public function create()
    {
        echo $this->name . "を作成しました\n";
    }
}
```