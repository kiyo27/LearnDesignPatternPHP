<?php
require_once 'Employee.php';
require_once 'Employees.php';
require_once 'SalesmanIterator.php';

function dumpWithForeach($iterator) {
  echo '<ul>';
  foreach ($iterator as $employee) {
    printf('<li>%s (%d, %s)</li>',
      $employee->getName(),
      $employee->getAge(),
      $employee->getJob());
  }
  echo '</ul>';
  echo '<hr>';
}

$employees = new Employees();
$employees->add(new Employee('SMITH', 32, 'CLERK'));
$employees->add(new Employee('ALLEN', 26, 'SALESMAN'));
$employees->add(new Employee('MARTIN', 50, 'SALESMAN'));
$employees->add(new Employee('CLARK', 45, 'MANAGER'));
$employees->add(new Employee('KING', 58, 'PRESIDENT'));

$iterator = $employees->getIterator();

echo '<ul>';
while ($iterator->valid()) {
  $employee = $iterator->current();
  printf('<li>%s (%d, %s)</li>',
    $employee->getName(),
    $employee->getAge(),
    $employee->getJob());

  $iterator->next();
}

echo '</ul>';
echo '<hr>';

dumpWithForeach($iterator);

dumpWithForeach(new SalesmanIterator($iterator));
