<?php
require_once 'Group.php';
require_once 'Employee.php';

/**
 * ツリー構造を作成
 */
$root_entry = new Group("001", "本社");
$root_entry->add(new Employee("00101", "CEO"));
$root_entry->add(new Employee("00102", "CTO"));
$group1 = new Group("010", "●●支店");
$group1->add(new Employee("01001", "支店長"));
$group1->add(new Employee("01002", "佐々木"));
$group1->add(new Employee("01003", "鈴木"));

$group2 = new Group("110", "▲▲営業所");
$group2->add(new Employee("11001", "河村"));
$group1->add($group2);
$root_entry->add($group1);

$group3 = new Group("020", "××支店");
$group3->add(new Employee("02001", "萩原"));

/**
 * ツリー構造をダンプ
 */
$root_entry->dump();