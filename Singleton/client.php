<?php

use Singleton\Singleton;

require('../vendor/autoload.php');

$instance1 = Singleton::getInstance();
sleep(1);
$instance2 = Singleton::getInstance();

echo $instance1->getID() === $instance2->getID();
echo "\n";