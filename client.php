<?php

use Factory\ReaderFactory;

require('vendor/autoload.php');

$filename = "music.xml";

$factory = new ReaderFactory();
$data = $factory->create($filename);
$data->read();
$data->display();