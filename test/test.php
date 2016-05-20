<?php

$dirs = [

    __DIR__,

];

require_once '../src/freeload.php';
$freeload = new Freeload;
$freeload->Autoload($dirs);

// Load a generic class without requiring the file
$generic = new Generic;
echo 'Register Class Test: ' . "\n" . $generic->test();
