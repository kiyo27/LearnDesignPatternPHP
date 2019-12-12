<?php

use TemplateMethod\ListDisplay;
use TemplateMethod\TableDisplay;

require('vendor/autoload.php');

$data = [
    'Design Pattern',
    'Gang of Four',
    'Template Method Sample1',
    'Template Method Sample2',
];

$display1 = new ListDisplay($data);
$display2 = new TableDisplay($data);

$display1->display();
echo "\n";
$display2->display();