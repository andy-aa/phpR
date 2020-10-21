<?php

header("Content-Type: text/plain");

use TexLab\R\Runner;

require "../vendor/autoload.php";

$path = '"c:\\Program Files\\R\\R-3.6.3\\bin\\Rscript.exe"';

$r = new Runner($path);

$code = <<<R
x=1:10
y=5+1*x+rnorm(10)
summary(lm(y~x));
R;

echo $r->run($code);