<?php
$options = '';
$longopts = [
    'optional::',
    'comment::'
];
$options = getopt($options, $longopts);

var_dump($options);
var_dump($options['comment']);