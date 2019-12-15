<?php
namespace Iterator;

use FilterIterator;

class SalesmanIterator extends FilterIterator
{
    public function __construct($iterator)
    {
        parent::__construct($iterator);
    }

    public function accept()
    {
        $employee = $this->current();
        return ($employee->getJob() === 'SALESMAN');
    }
}