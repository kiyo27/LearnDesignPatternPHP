<?php
require('../vendor/autoload.php');

use Composite\Directory;
use Composite\File;

$rootDir = new Directory('root');
$rootDir->add(new File("vi", 1000));
$rootDir->printList();