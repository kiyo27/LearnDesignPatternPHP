<?php

use State\User;

require('vendor/autoload.php');

$context = new User('ほげ');

$mode = $argv[1];
switch ($mode) {
    case 'state':
        echo "状態を遷移します" . "\n";
        $context->switchState();
    break;
    case 'inc':
        echo "カウントアップします" . "\n";
        $context->incrementCount();
    break;
    case 'reset':
        echo "カウントをリセットします" . "\n";
        $context->resetCount();
    break;
}
