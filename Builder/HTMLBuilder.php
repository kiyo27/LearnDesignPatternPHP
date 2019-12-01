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