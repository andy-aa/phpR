<?php

declare(strict_types=1);

namespace Test;

use PHPUnit\Framework\TestCase;
use TexLab\R\Runner;
use TexLab\R\Script;

class ScriptTest extends TestCase
{
    /**
     * @var Script
     */
    private Script $script;

    public function setUp(): void
    {
        $this->script = new Script(new Runner());
    }

    public function testOption(): void
    {

        $this->assertEquals(
            '',
            $this->script->reset()->getFullScript()
        );

        $this->assertEquals(
            "x <- c(1, 2, 3);\ny <- c(4, 5, 6);\n",
            $this->script
                ->reset()
                ->addVector('x', [1, 2, 3])
                ->addVector('y', [4, 5, 6])
                ->getFullScript()
        );

        $this->assertEquals(
            "x <- c(1, 2, 3);\ny <- c(4, 5, 6);\nsum(x+y)",
            $this->script
                ->reset()
                ->addVector('x', [1, 2, 3])
                ->addVector('y', [4, 5, 6])
                ->setScript('sum(x+y)')
                ->getFullScript()
        );

//        $this->assertEquals(
//            ['php_x' => 21],
//            (new Script(new Runner()))
//                ->addVector('x', [1, 2, 3])
//                ->addVector('y', [4, 5, 6])
//                ->run("php_x = sum(x+y)")
//        );
    }
}
