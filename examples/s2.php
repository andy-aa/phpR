<?php

header("Content-Type: text/plain");

use TexLab\R\Runner;

require "../vendor/autoload.php";

$r = new Runner();

$code = <<<R
data <- data.frame(
    x=c(1,2,3,4,5,6,7),
    y=c(1,3,2,4,4,6,6)
)

summary(lm(y~x, data=data));
R;

echo $r->run($code);