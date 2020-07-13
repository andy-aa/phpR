<?php

use TexLab\R\Script;
use TexLab\R\Runner;

require "../vendor/autoload.php";

$r = new Script(new Runner('Rscript.exe'));

$dataArray = [
    'x' => [1, 2, 3, 4, 5, 6, 7],
    'y' => [1, 3, 2, 4, 4, 6, 6]
];

echo $r
    ->addDataFrame("data", $dataArray)
    ->setScript("summary(lm(y~x, data=data));")
    ->getFullScript();