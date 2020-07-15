<?php

namespace TexLab\R;

interface RunnerInterface
{
    /**
     * @param string $script
     * @return array
     */
    public function run(string $script): string;

    /**
     * @param string $path
     * @return $this|object
     */
    public function setPath(string $path): object;
}