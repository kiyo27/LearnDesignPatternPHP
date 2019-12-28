<?php

use ChainOfResponsibility\AlphabetValidationHandler;
use ChainOfResponsibility\MaxLengthValidation;
use ChainOfResponsibility\NotNullValidationHandler;
use ChainOfResponsibility\NumberValidationHandler;

require('../vendor/autoload.php');

$validate_type = $argv[1];

$not_null_handler = new NotNullValidationHandler();
$length_handler = new MaxLengthValidation(11);

$option_handler = null;
switch ($validate_type) {
    case 1:
        $option_handler = new AlphabetValidationHandler();
        break;
    case 2:
        $option_handler = new NumberValidationHandler();
        break;
}

if (!is_null($option_handler)) {
    $length_handler->setHandler($option_handler);
}
$handler = $not_null_handler->setHandler($length_handler);

$result = $handler->validate($argv[2]);
if ($result === true) {
    echo 'OK' . "\n";
} else if (is_string($result) && $result !== '') {
    echo $result . "\n";
}