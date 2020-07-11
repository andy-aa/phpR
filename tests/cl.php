<?php

use TexLab\R\Runner;

require "../vendor/autoload.php";

$r = new Runner('Rscript.exe');

$res = $r->run(<<<R
x=1:10

y=5+1*x+rnorm(10)

summary(lm(y~x));

R);

echo join("\n", $res);