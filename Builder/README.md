# Builder

![buildr](./img/Builder_UML_class_diagram.svg)

## Template Method との違い
Builder パターンでは Director 役が Builder 役をコントロールします。 Template Method ではスーパークラスがサブクラスをコントロールします。

## Builder クラス
```php
<?php

namespace Builder;

abstract class Builder
{
    public abstract function makeTitle($title);

    public abstract function makeString($str);

    public abstract function makeItems($items);

    public abstract function close();
}
```

## Director クラス
```php
<?php

namespace Builder;

use Builder\Builder;

class Director
{
    private $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function construct()
    {
        $this->builder->makeTitle("Greeting");
        $this->builder->makeString("朝から昼にかけて");
        $this->builder->makeItems([
            "おはようございます。",
            "こんにちは。"
        ]);
        $this->builder->makeString("夜に");
        $this->builder->makeItems([
            "こんばんは。",
            "おやすみなさい。",
            "さようなら。"
        ]);
        $this->builder->close();
    }
}
```

## TextBuilder クラス
```php
<?php

namespace Builder;

use Builder\Builder;

class TextBuilder extends Builder
{
    private $buffer;

    public function makeTitle($title)
    {
        $this->buffer .= "==================" . "\n";
        $this->buffer .= "[" . $title . "]" . "\n";
        $this->buffer .= "\n";
    }

    public function makeString($str)
    {
        $this->buffer .= "▫️" . $str . "\n";
        $this->buffer .= "\n";
    }

    public function makeItems($items)
    {
        for ($i = 0; $i < count($items); $i++) {
            $this->buffer .= "・" . $items[$i] . "\n";
        }
        $this->buffer .= "\n";
    }

    public function close()
    {
        $this->buffer .= "==================" . "\n";
    }

    public function getResult()
    {
        return $this->buffer;
    }
}
```

## HTMLBuilder クラス
```php
<?php

namespace Builder;

use Builder\Builder;

class HTMLBuilder extends Builder
{
    private $filename;

    private $writer;

    public function makeTitle($title)
    {
        $this->filename = $title . ".html";
        $this->writer = fopen($this->filename,"w");
        fwrite($this->writer, "<html><head><title>" . $title ."</title></head><body>");
        fwrite($this->writer, "<h1>" . $title . "</h1>");
    }

    public function makeString($str)
    {
        fwrite($this->writer,"<p>" . $str . "</p>");
    }

    public function makeItems($items)
    {
        fwrite($this->writer,"<ul>");
        for ($i = 0; $i < count($items); $i++) {
            fwrite($this->writer,"<li>" . $items[$i]. "</li>");
        }
        fwrite($this->writer,"</ul>");
    }

    public function close()
    {
        fwrite($this->writer,"</body></html>");
        fclose($this->writer);
    }

    public function getResult()
    {
        return $this->filename;
    }
}
```