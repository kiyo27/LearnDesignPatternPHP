<?php

require('vendor/autoload.php');

use Bridge\Display;
use Bridge\StringDisplayImpl;
use Bridge\CountDisplay;

$d1 = new Display(new StringDisplayImpl("Hello, world"));
$d1->display();

$d2 = new CountDisplay(new StringDisplayImpl("Hello, world"));
$d2->multiDisplay(3);
