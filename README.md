# Decorator
![img](Decorator_UML_class_diagram.svg)

## Component
```php
<?php
namespace Decorator;

interface Text
{
    public function getText();

    public function setText($str);
}
```

## Concrete Component
```php
<?php
namespace Decorator;

class PlainText implements Text
{
    private $textString = null;

    public function getText()
    {
        return $this->textString;
    }

    public function setText($str)
    {
        $this->textString = $str;
    }
}
```

## Decorator
```php
<?php
namespace Decorator;

abstract class TextDecorator implements Text
{
    private $text;

    public function __construct(Text $target)
    {
        $this->text = $target;
    }

    public function getText()
    {
        return $this->text->getText();
    }

    public function setText($str)
    {
        $this->text->setText($str);
    }
}
```

## Concrete Decorator
```php
<?php
namespace Decorator;

class UpperCaseText extends TextDecorator
{
    public function __construct(Text $target)
    {
        parent::__construct($target);
    }

    public function getText()
    {
        $str = parent::getText();
        $str = strtoupper($str);
        return $str;
    }
}
```