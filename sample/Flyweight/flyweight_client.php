<?php
require_once 'ItemFactory.php';

function dumpData($data) {
  echo '<dl>';
  foreach ($data as $object) {
    echo '<dt>' . htmlspecialchars($object->getName(), ENT_QUOTES, 'utf-8') . '</dt>';
    echo '<dd>商品番号:' . $object->getCode() . '</dd>';
    echo '<dd>\\' . number_format((int)$object->getPrice()) . '-</dd>';
  }
  echo '</dl>';
}

$factory = ItemFactory::getInstance('data.txt');

$items = array();
$items[] = $factory->getItem('ABC001');
$items[] = $factory->getItem('ABC002');
$items[] = $factory->getItem('ABC003');

if ($items[0] === $factory->getItem('ABC001')) {
  echo '同一オブジェクトです';
} else {
  echo '同一のオブジェクトではありません';
}

dumpData($items);