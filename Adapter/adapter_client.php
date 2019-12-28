<?php

use Adapter\DisplaySourceFileImple;

require('vendor/autoload.php');

$show_file = new DisplaySourceFileImple('./Adapter/ShowFile.php');
$show_file->display();