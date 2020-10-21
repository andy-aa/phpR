<?php

namespace TexLab\R;

interface RunnerInterface
{
    /**
     * @param string $script
     * @return string
     */
    public function run(string $script);

    /**
     * @param string $path
     * @return $this
     */
    public function setExecutePath(string $path);
}
