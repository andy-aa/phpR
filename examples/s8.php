<?php

use TexLab\R\Script;
use TexLab\R\Runner;

require "../vendor/autoload.php";

$r = new Script(new Runner());


$code = <<<R
library(base64enc)

temp_file_name <- tempfile()

x<-rnorm(1000)

png(file = temp_file_name, width = 300, height = 300, units = "px");

hist(x=x, col='blue');

dev.off();

php_plot_data_1 <- paste("data:image/png;base64,", base64enc::base64encode(temp_file_name))

png(file = temp_file_name, width = 300, height = 300, units = "px");

boxplot(x=x, col='red');

dev.off();

php_plot_data_2 <- paste("data:image/png;base64,", base64enc::base64encode(temp_file_name))

file.remove(temp_file_name)

R;

$data = $r->run($code)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<img src="<?= $data['php_plot_data_1'] ?>">
<img src="<?= $data['php_plot_data_2'] ?>">
</body>
</html>