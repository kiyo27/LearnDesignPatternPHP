<?php

use Memento\Data;
use Memento\DataCaretaker;

require('../vendor/autoload.php');

session_start();

$option = '';
$longoptions = [
    'comment::',
    'mode::',
];

$options = getopt($option, $longoptions);

$caretaker = new DataCaretaker();
$data = isset($_SESSION['data']) ? $_SESSION['data'] : new Data();
$mode = (is_null($options['mode']) ? '' : $options['mode']);

switch ($mode) {
    case 'add':
        $data->addComment((is_null($options['comment']) ? '' : $options['comment']));
        break;
    case 'save':
        $caretaker->setSnapshot($data->takeSnapshot());
        echo "データを保存しました。";
        break;
    case 'restore':
        $data->restoreSnapshot($caretaker->getSnapshot());
        echo "データを保存しました。";
        break;
    case 'clear':
        $data = new Data();
}

if (!is_null($data)) {
    foreach ($data->getComment() as $comment) {
        echo $comment . "\n";
    }
}

$_SESSION['data'] = $data;