<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TexLab\R\Runner;


class RunnerTest extends TestCase
{
    /**
     * @var Runner
     */
    private Runner $runner;

    public function setUp(): void
    {
        $path = PHP_OS_FAMILY === 'Windows' ? 'Rscript.exe' : 'Rscript';
//        $path = 'Rscript.exe';
        $this->runner = new Runner($path);
    }

    function testOption(): void
    {

        $this->assertEquals(
            '[1] 11',
            $this->runner->run("5+6")
        );

        $this->assertEquals(
            " [1]  1  2  3  4  5  6  7  8  9 10\n [1]   1   4   9  16  25  36  49  64  81 100"
            ,
            $this->runner->run("x=1:10\nprint(x)\nprint(x**2)")
        );

        $this->assertEquals(

            "\n" .
            "Call:\n" .
            "lm(formula = x ~ y)\n\n" .
            "Coefficients:\n" .
            "(Intercept)            y\n" .
            "  1.123e-15    1.000e+00\n"

            ,
            $this->runner->run(<<<RSCRIPT
x=1:10
y=1:10
lm(x~y)
RSCRIPT
            )
        );

    }

}