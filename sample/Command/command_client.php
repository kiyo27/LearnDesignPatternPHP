<?php
require_once 'Queue.php';
require_once 'TouchCommand.php';
require_once 'CompressCommand.php';
require_once 'CopyCommand.php';
require_once 'File.php';

$queue = new Queue();
$file = new File("sample.txt");
$queue->addCommand(new TouchCommand($file));
$queue->addCommand(new CompressCommand($file));
$queue->addCommand(new CopyCommand($file));

$queue->run();