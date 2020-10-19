<?php

namespace TexLab\R;

interface RunnerInterface
{
    /**
     * @param string $script
     * @return string|false
     */
    public function run(string $script);

    /**
     * @param string $path
     * @return $this
     */
    public function setPath(string $path);
}