<?php

class TestArray {
  private $employees;

  public function __construct() {
    $this->employees = new ArrayObject();
  }

  public function addItem($employee) {
    $this->employees[] = $employee;
  }

  public function createIterator() {
    return $this->employees->getIterator();
  }
}

class Employee {
  private $name;
  private $age;
  private $job;

  public function __construct(String $name, int $age, String $job) {
    $this->name = $name;
    $this->age = $age;
    $this->job = $job;
  }

  public function getName() {
    return $this->name;
  }

  public function getAge() {
    return $this->age;
  }

  public function getJob() {
    return $this->job;
  }
}

$employees = new TestArray();
$employees->addItem(new Employee('SMITH', 32, 'SalesPerson'));
$employees->addItem(new Employee('ADAM', 50, 'Philosophy'));

$iterator = $employees->createIterator();

foreach($iterator as $employee) {
  echo $employee->getName() . "<br>";
  echo $employee->getAge() . "<br>";
  echo $employee->getJob() . "<br>";
}