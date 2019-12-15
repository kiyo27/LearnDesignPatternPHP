<?php

use Iterator\Employee;
use Iterator\Employees;
use Iterator\SalesmanIterator;

require('vendor/autoload.php');

function dumpWithForeach($iterator) {
    foreach ($iterator as $employee) {
        printf('%s (%d %s)', $employee->getName(), $employee->getAge(), $employee->getJob());
        echo "\n";
    }
}

$employees = new Employees;
$employees->add(new Employee('SMITH', 32, 'CLEARK'));
$employees->add(new Employee('ALLEN', 26, 'ASLESMAN'));
$employees->add(new Employee('MARTIN', 50, 'SALESMAN'));
$employees->add(new Employee('CLARK', 45, 'MANAGER'));
$employees->add(new Employee('KING', 58, 'PRESIDENT'));

$iterator = $employees->getIterator();

while ($iterator->valid()) {
    $employee = $iterator->current();
    printf('%s (%d %s)', $employee->getName(), $employee->getAge(), $employee->getJob());
    echo "\n";
    $iterator->next();
}

dumpWithForeach($iterator);

dumpWithForeach(new SalesmanIterator($iterator));
