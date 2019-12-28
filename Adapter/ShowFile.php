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