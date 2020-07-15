<?php

use TexLab\R\Script;
use TexLab\R\Runner;

require "../vendor/autoload.php";

$path = '"c:\\Program Files\\R\\R-3.6.3\\bin\\Rscript.exe"';

$r = new Script(new Runner($path));

$code = <<<R
php_x = sum(x+y)
R;

print_r(
    $r
        ->addVector('x', [1, 2, 3])
        ->addVector('y', [4, 5, 6])
        ->run($code)
);


