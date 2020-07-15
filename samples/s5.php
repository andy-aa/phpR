<?php

use TexLab\R\Script;
use TexLab\R\Runner;

require "../vendor/autoload.php";

$path = '"c:\\Program Files\\R\\R-3.6.3\\bin\\Rscript.exe"';

$r = new Script(new Runner($path));

$dataArray = [
    'x' => [1, 2, 3, 4, 5, 6, 7],
    'y' => [1, 3, 2, 4, 4, 6, 6]
];

$code = <<<R
library(base64enc)
php_x <- dirname(tempdir())
#php_x1 <- tempfile()
#php_x1 <- "myplot.png"

png(file = php_x1 <- tempfile());

plot(y~x, data=data);

dev.off();

php_x2 <- base64enc::base64encode(php_x1)

file.remove(php_x1)

R;

print_r(
    $r
        ->addDataFrame("data", $dataArray)
        ->run($code)
);

//echo 123;