<?php
abstract class Builder {
    abstract public function makeTitle($title);
    abstract public function makeString($str);
    abstract public function makeItems($items);
    abstract public function close();
}

class Director {
    private $builder;

    public function __construct(Builder $builder) {
        $this->builder = $builder;
    }

    public function construct() {
        $this->builder->makeTitle('Greeting');
        $this->builder->makeString('朝から昼にかけて');
        $this->builder->close();
    }
}

class TextBuilder extends Builder {
    private $buffer;

    public function makeTitle($title) {
        $this->buffer = "=============================\n";
        $this->buffer .= "『" . $title . "』\n";
        $this->buffer .= "\n";
    }

    public function makeString($str) {
        $this->buffer .= '■' . $str . "\n";
        $this->buffer .= "\n";
    }

    public function makeItems($items) {
        for ($i=0; $i<count($items); $i++) {
            $this->buffer .= "・" . $items[$i] . "\n";
        }
        $this->buffer .= "\n";
    }

    public function close() {
        $this->buffer .= "=============================\n";
    }

    public function getResult() {
        return $this->buffer;
    }
}

class HTMLBuilder extends Builder {
    private $filename;
    private $writer;

    public function makeTitle($title) {
        $this->filename = $title . ".html";
        try {
            $this->writer = fopen(dirname(__FILE__) . "\\" . $this->filename,"w");
        } catch (Exception $e) {
            echo $e;
        }
        fwrite($this->writer, "<html><head><title>" . $title . "</title></head><body>");
        fwrite($this->writer, "<h1>" . $title . "</h1>");
    }

    public function makeString($str) {
        fwrite($this->writer, "<p>" . $str . "</p>");
    }

    public function makeItems($items) {
        fwrite($this->writer, "<ul>");
        for ($i=0; $i<count($items); $i++) {
            fwrite($this->writer, "<li>" . $items[i] . "</li>");
        }
        fwrite($this->writer, "</ul>");
    }

    public function close() {
        fwrite($this->writer, "</body></html>");
        fclose($this->writer);
    }

    public function getResult() {
        return $this->filename;
    }
}

$textbuilder = new HTMLBuilder();
$director = new Director($textbuilder);
$director->construct();
$result = $textbuilder->getResult();