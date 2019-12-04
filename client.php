<?php
require('vendor/autoload.php');

use Prototype\Manager;
use Prototype\UnderlinePen;
use Prototype\MessageBox;

$manager = new Manager();

$upen = new UnderlinePen('~');
$mbox = new MessageBox('*');
$manager->register("warning box", $mbox);

$manager->register("strong message", $upen);
$p1 = $manager->create("strong message");
$p1->use("Hello world");

$p2 = $manager->create("warning box");
$p2->use("Hello world");