<?php

namespace TexLab\R;

interface RunnerInterface
{
    /**
     * @param string $script
     * @return array
     */
    public function run(string $script): array;

    /**
     * @param string $path
     * @return Runner
     */
    public function setPath(string $path);
}