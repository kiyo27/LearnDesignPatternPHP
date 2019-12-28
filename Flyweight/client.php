<?php

use Flyweight\ItemFactory;

require('../vendor/autoload.php');

function dumpData($data) {
    foreach($data as $object) {
        echo $object->getName() . " ";
        echo "商品番号" . $object->getCode() . " ";
        echo $object->getPrice();
    }
}

$factory = ItemFactory::getInstance('./Flyweight/data.txt');

$items = [];
$items[] = $factory->getItem('ABC001');
$items[] = $factory->getItem('ABC002');
$items[] = $factory->getItem('ABC003');

if ($items[0] === $factory->getItem('ABC001')) {
    echo "同一オブジェクトです\n";
} else {
    echo "同一のオブジェクトではありません\n";
}

dumpData($items);