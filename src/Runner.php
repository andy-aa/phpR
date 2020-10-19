<?php

namespace TexLab\R;

class Runner implements RunnerInterface
{
    /**
     * @var string
     */
    protected string $path = '';

    /**
     * Runner constructor.
     * @param string|null $path
     */
    public function __construct(string $path = null)
    {
        $this->setPath($path ?? PHP_OS_FAMILY === 'Windows' ? 'Rscript.exe' : 'Rscript');
    }

    /**
     * @param string $script
     * @return string|false
     */
    public function run(string $script)
    {
        if (($temp = tmpfile()) === false) {
            return false;
        }

        fwrite($temp, $script);

        exec(
            "$this->path " . stream_get_meta_data($temp)['uri'],
            $output
        );

        fclose($temp);

        return join("\n", $output);

    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath(string $path)
    {
        $this->path = $path;
        return $this;
    }
}