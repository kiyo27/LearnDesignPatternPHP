<?php
require_once 'Group.php';
require_once 'Employee.php';
require_once 'DumpVisitor.php';
require_once 'CountVisitor.php';

$root_entry = new Group('001', '本社');
$root_entry->add(new Employee('00101', 'CEO'));
$root_entry->add(new Employee('00102', 'CTO'));

$group1 = new Group('010', '●●支店');
$group1->add(new Employee('01001', '支店長'));
$group1->add(new Employee('01002', 'sasaki'));
$group1->add(new Employee('01003', 'suzuki'));
$group1->add(new Employee('01004', 'yoshida'));

$group2 = new Group('110', '▲▲営業所');
$group2->add(new Employee('11001', 'kawamura'));
$group1->add($group2);
$root_entry->add($group1);

$group3 = new Group('020', '××支店');
$group3->add(new Employee('02001', 'hagiwara'));
$group3->add(new Employee('02002', 'tajima'));
$group3->add(new Employee('02002', 'shirai'));
$root_entry->add($group3);

$root_entry->accept(new DumpVisitor());

$visitor = new CountVisitor();
$root_entry->accept($visitor);
echo '組織数:' . $visitor->getGroupCount() . '<br>';
echo '社員数:' . $visitor->getEmployeeCount() . '<br>';