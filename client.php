<?php

use Strategy\ItemDataContext;
use Strategy\ReadFixedLengthDataStrategy;
use Strategy\ReadTabSeparatedDataStrategy;

require('vendor/autoload.php');

function dumpData($data)
{
    foreach ($data as $object) {
        echo $object->item_name . "\n";
        echo "商品番号：" . $object->item_code . "\n";
        echo number_format($object->price) . "\n";
        echo date('Y/m/d', $object->release_date) . "発売" . "\n";
    }
}

$strategy1 = new ReadFixedLengthDataStrategy('fixed_length_data.txt');
$context1 = new ItemDataContext($strategy1);
dumpData($context1->getItemData());

$strategy2 = new ReadTabSeparatedDataStrategy('tab_separated_data.txt');
$context2 = new ItemDataContext($strategy2);
dumpData($context2->getItemData());