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