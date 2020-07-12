<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TexLab\R\Converter;
use TexLab\R\Runner;
use TexLab\R\Script;


class ScriptTest extends TestCase
{

    function testOption()
    {
        $script = new Script(
            new Runner('Rscript.exe')
        );

        $this->assertEquals(
            '',
            $script->getFullScript()
        );

        $this->assertEquals(
            "x <- c(1, 2, 3);\ny <- c(4, 5, 6);\n",
            $script
                ->addVector('x', [1, 2, 3])
                ->addVector('y', [4, 5, 6])
                ->getFullScript()
        );

        $this->assertEquals(
            "x <- c(1, 2, 3);\ny <- c(4, 5, 6);\nsum(x+y)",
            $script
                ->reset()
                ->addVector('x', [1, 2, 3])
                ->addVector('y', [4, 5, 6])
                ->setScript('sum(x+y)')
                ->getFullScript()
        );

        $this->assertEquals(
            '[1] 21',
            $script
                ->reset()
                ->addVector('x', [1, 2, 3])
                ->addVector('y', [4, 5, 6])
                ->setScript('sum(x+y)')
                ->run()
        );
    }

}