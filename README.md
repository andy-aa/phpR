# TexLab\R
[![Build Status](https://travis-ci.com/andy-aa/phpR.svg?branch=master)](https://travis-ci.com/andy-aa/phpR)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Unstable Version](https://img.shields.io/packagist/vpre/texlab/lightdb.svg)](https://packagist.org/packages/texlab/r)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%20Max-brightgreen.svg?style=flat-square)](https://phpstan.org/)
[![Psalm](https://img.shields.io/badge/Psalm-Level%20Max-brightgreen.svg?style=flat-square)](https://psalm.dev/) 
[![Actions Status: CI](https://github.com/andy-aa/phpR/workflows/CI/badge.svg)](https://github.com/andy-aa/phpR/actions?query=workflow%3ACI)

## install
```
composer require texlab/r
```

### usage example
#### PHP code
```php
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
```
#### output
```
Call:
lm(formula = y ~ x)

Residuals:
    Min      1Q  Median      3Q     Max
-1.1988 -0.9164 -0.1257  0.7085  1.7562

Coefficients:
            Estimate Std. Error t value Pr(>|t|)
(Intercept)   4.5280     0.7291   6.211 0.000256 ***
x             1.0529     0.1175   8.961 1.91e-05 ***
---
Signif. codes:  0 '***' 0.001 '**' 0.01 '*' 0.05 '.' 0.1 ' ' 1

Residual standard error: 1.067 on 8 degrees of freedom
Multiple R-squared:  0.9094,    Adjusted R-squared:  0.8981
F-statistic: 80.29 on 1 and 8 DF,  p-value: 1.914e-05

```
#### PHP code
```php
<?php

use TexLab\R\Script;
use TexLab\R\Runner;

require "../vendor/autoload.php";

$r = new Script(new Runner());


$code = <<<R
library(base64enc)

temp_file_name <- tempfile()

png(file = temp_file_name, width = 300, height = 300, units = "px");

hist(x=rnorm(1000), col='blue');

dev.off();

php_plot_data <- paste("data:image/png;base64,", base64enc::base64encode(temp_file_name))

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
<img src="<?= $data['php_plot_data'] ?>">
</body>
</html>
```
#### output
![image](https://user-images.githubusercontent.com/46691193/96785554-a1f57500-13f7-11eb-907f-b5ef36c4ec97.png)

