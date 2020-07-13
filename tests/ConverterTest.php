<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TexLab\R\Converter;


class ConverterTest extends TestCase
{

    function testOption(): void
    {
        $converter = new Converter();
//        $converter = new class() { use Converter; };
//        $converter = $this->getMockForTrait(Converter::class);

        $this->assertEquals(
            "x <- c(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);\n",
            $converter->vector("x", [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
        );

        $this->assertEquals(
            "data <- data.frame(x = c(1, 2, 3), y = c(4, 5, 6), z = c(7, 8, 9));\n",
            $converter->dataFrame("data", ['x' => [1, 2, 3], 'y' => [4, 5, 6], 'z' => [7, 8, 9]])
        );
    }

}