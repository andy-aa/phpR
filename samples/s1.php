<?php

use TexLab\R\Runner;

require "../vendor/autoload.php";

$r = new Runner('Rscript.exe');

$code = <<<R
x=1:10
y=5+1*x+rnorm(10)
summary(lm(y~x));
R;

$res = $r->run($code);

echo join("\n", $res);