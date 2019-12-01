<?php

require('vendor/autoload.php');

use Display\Display;
use Display\StringDisplayImpl;
use Display\CountDisplay;

$d1 = new Display(new StringDisplayImpl("Hello, world"));
$d1->display();

$d2 = new CountDisplay(new StringDisplayImpl("Hello, world"));
$d2->multiDisplay(3);