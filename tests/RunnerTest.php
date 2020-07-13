<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TexLab\R\Runner;


class RunnerTest extends TestCase
{

    function testOption():void
    {

        $runner = new Runner('Rscript.exe');

        $this->assertEquals(
            ['[1] 11'],
            $runner->run("5+6")
        );

        $this->assertEquals(
            [
                " [1]  1  2  3  4  5  6  7  8  9 10",
                " [1]   1   4   9  16  25  36  49  64  81 100"
            ],
            $runner->run("x=1:10\nprint(x)\nprint(x**2)")
        );

        $this->assertEquals(
            [
                '',
                'Call:',
                'lm(formula = x ~ y)',
                '',
                'Coefficients:',
                '(Intercept)            y',
                '  1.123e-15    1.000e+00',
                ''
            ]
            ,
            $runner->run(<<<RSCRIPT
x=1:10
y=1:10
lm(x~y)
RSCRIPT
            )
        );

    }

}