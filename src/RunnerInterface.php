<?php

namespace TexLab\R;

interface RunnerInterface
{
    /**
     * @param string $script
     * @return string
     */
    public function run(string $script): string;

    /**
     * @param string $path
     * @return $this|object
     */
    public function setPath(string $path): object;
}