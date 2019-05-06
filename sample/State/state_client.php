<?php
require_once 'User.php';

session_start();
$context = isset($_SESSION['context']) ? $_SESSION['context'] : null;
if (is_null($context)) {
  $context = new User('ほげ');
}

$mode = (isset($_GET['mode']) ? $_GET['mode'] : '');
switch ($mode) {
  case 'state':
    echo '<p style="color: #aa0000">状態を遷移します</p>';
    $context->switchState();
    break;
  case 'inc';
    echo '<p style="color: #008800">カウントアップする</p>';
    $context->incrementCount();
    break;
  case 'reset':
    echo '<p style="color: #008800">カウントをリセットします</p>';
    $context->resetCount();
    break;
}

$_SESSION['context'] = $context;

echo 'ようこそ、' . $context->getUserName() . 'さん<br>';
echo '現在ログインして' . ($context->isAuthenticated() ? 'います' : 'いません') . '<br>';
echo '現在のカウント:' . $context->getCount() . '<br>';
echo $context->getMenu() . '<br>';