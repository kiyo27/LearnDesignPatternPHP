<?php

namespace Visitor;

class ListVisitor extends Visitor
{
    private $currentDir;
    
    public function visit($directory)
    {
        if ($directory instanceof File) {
            echo $this->currentDir . "/" . $directory . "\n";
            return;
        }

        echo $this->currentDir . "/" . $directory . "\n";
        $savedir = $this->currentDir;
        $this->currentDir = $this->currentDir . "/" . $directory->getName();
        foreach($directory as $entry) {
            $entry->accecpt($this);
        }
        $this->currentDir = $savedir;
    }
}