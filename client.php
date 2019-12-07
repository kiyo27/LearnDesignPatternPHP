<?php
require('vendor/autoload.php');

use Visitor\ListVisitor;
use Visitor\Directory;
use Visitor\File;

$rootdir = new Directory("root");
$bindir = new Directory("bin");
$rootdir->add($bindir);
$bindir->add(new File("vi", 100000));
$rootdir->accept(new ListVisitor());