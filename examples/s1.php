<?php

header("Content-Type: text/plain");

use TexLab\R\Runner;

require "../vendor/autoload.php";

$r = new Runner();

$code = <<<R
x=1:10
y=5+1*x+rnorm(10)
summary(lm(y~x));
R;

echo $r->run($code);