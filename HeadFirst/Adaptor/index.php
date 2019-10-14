<?php
require_once 'MallardDuck.php';
require_once 'TurkeyAdapter.php';
require_once 'WildTurkey.php';

$duck = new MallardDuck();
$turkey = new WildTurkey();
$turkeyAdapter = new TurkeyAdapter($turkey);

$turkey->gobble();
echo "<br>";
$turkey->fly();
echo "<br>";
testDuck($turkeyAdapter);

function testDuck(Duck $duck) {
  $duck->quack();
  echo "<br>";
  $duck->fly();
}