<?php
require_once 'ItemManager.php';
require_once 'DeepCopyItem.php';
require_once 'ShallowCopyItem.php';

function testCopy(ItemManager $manager, $item_code) {
  $item1 = $manager->create($item_code);
  $item2 = $manager->create($item_code);

  $item2->getDetail()->comment = 'コメントを書き換えました';

  echo 'オリジナル';
  $item1->dumpData();
  echo 'コピー';
  $item2->dumpData();
  echo '<hr>';
}

$manager = new ItemManager();

$item = new DeepCopyItem('ABC001', '限定Tシャツ', 3800);
$detail = new stdClass();
$detail->comment = '商品Aのコメントです';
$item->setDetail($detail);
$manager->registItem($item);

$item = new ShallowCopyItem('ABC002', 'ぬいぐるみ', 1500);
$detail = new stdClass();
$detail->comment = '商品Bのコメントです';
$item->setDetail($detail);
$manager->registItem($item);

testCopy($manager, 'ABC001');
testCopy($manager, 'ABC002');