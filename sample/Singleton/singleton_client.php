<?php
require_once 'Singleton.php';

$instance1 = Singleton::getInstance();
sleep(1);
$instance2 = Singleton::getInstance();

echo '<hr>';

echo 'instance ID : ' . $instance1->getID() . '<br>';
echo '$instance1->getID() === $instance2->getID() : ' . ($instance1->getID() === $instance2->getID() ? 'true' : 'false');
echo '<hr>';

echo '$instance1 === $instance2 : ' . ($instance1 === $instance2 ? 'true' : 'false');
