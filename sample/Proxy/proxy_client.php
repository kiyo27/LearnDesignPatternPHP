<?php
if (isset($_POST['dao']) && isset($_POST['proxy'])) {
  $dao = $_POST['dao'];
  switch ($dao) {
    case 1:
      include_once 'MockItemDao.php';
      $dao = new MockItemDao();
      break;
    case 2:
      include_once 'DbItemDao.php';
      $dao = new DbItemDao();
      break;
  }
  $proxy = $_POST['proxy'];
  switch ($proxy) {
    case 1:
      include_once 'ItemDaoProxy.php';
      $dao = new ItemDaoProxy($dao);
      break;
  }

  for ($item_id = 1; $item_id <= 3; $item_id++) {
    $item = $dao->findById($item_id);
    echo 'ID=' . $item_id . 'の商品は「' . $item->getName() . '」です<br>';
  }

  $item = $dao->findById(2);
  echo 'ID=' . $item_id . 'の商品は「' . $item->getName() . '」です<br>';
}
?>
<hr>
<form actoin="" method="post">
  <div>
    Daoの種類:
    <input type="radio" name="dao" value="2" checked>DbItemDao
    <input type="radio" name="dao" value="1">MockItemDao
  </div>
  <div>
    Proxyの使用
    <input type="radio" name="proxy" value="0" checked>しない
    <input type="radio" name="proxy" value="1">する
  </div>
  <div>
    <input type="submit">
  </div>
</form>