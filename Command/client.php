<?php

use Command\CompressCommand;
use Command\CopyCommand;
use Command\File;
use Command\Queue;
use Command\TouchCommand;

require('../vendor/autoload.php');

$queue = new Queue();
$file = new File('sample.txt');
$queue->addCommand(new TouchCommand($file));
$queue->addCommand(new CompressCommand($file));
$queue->addCommand(new CopyCommand($file));

$queue->run();