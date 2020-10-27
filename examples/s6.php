<?php

use TexLab\R\Script;
use TexLab\R\Runner;

require "../vendor/autoload.php";

$r = new Script(new Runner());

$dataArray = [
    'x' => [1, 2, 3, 4, 5, 6, 7],
    'y' => [2, 3, 2, 4, 4, 6, 6]
];

$code = <<<R
#install.packages("base64enc")

library(base64enc)

temp_file_name <- tempfile()

png(file = temp_file_name);

plot(y~x, data=data);

abline(lm(y~x, data=data), col='red')

dev.off();

php_plot_data <- paste("data:image/png;base64,", base64enc::base64encode(temp_file_name))

file.remove(temp_file_name)

R;

$data = $r
    ->addDataFrame("data", $dataArray)
    ->run($code)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<img src="<?= $data['php_plot_data'] ?>">
</body>
</html>