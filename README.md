# TexLab\R

## install
```
composer require texlab/r
```

### usage example
```php
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
```
### output
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
