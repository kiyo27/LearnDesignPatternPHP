<?php

use Decorator\DoubleByteText;
use Decorator\PlainText;
use Decorator\UpperCaseText;

require('../vendor/autoload.php');

$text = $argv[1];
$decorator = $argv[2];

$text_object = new PlainText;
$text_object->setText($text);

switch($decorator) {
    case 'double':
        $text_object = new DoubleByteText($text_object);
    break;
    case 'upper':
        $text_object = new UpperCaseText($text_object);
    break;
}
echo $text_object->getText();