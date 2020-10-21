<?php

header("Content-Type: text/plain");

use TexLab\R\Script;
use TexLab\R\Runner;

require "../vendor/autoload.php";

$r = new Script(new Runner());

print_r(
    $r
        ->addVector('x', [1, 2, 3])
        ->addVector('y', [4, 5, 6])
        ->run('php_x = sum(x+y)')
);