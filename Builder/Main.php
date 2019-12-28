<?php
require('../vendor/autoload.php');

use Builder\TextBuilder;
use Builder\HTMLBuilder;
use Builder\Director;

$textBuilder = new TextBuilder();
$director = new Director($textBuilder);
$director->construct();
$result = $textBuilder->getResult();
echo $result;

$htmlBuilder = new HTMLBuilder();
$director = new Director($htmlBuilder);
$director->construct();
$filename = $htmlBuilder->getResult();