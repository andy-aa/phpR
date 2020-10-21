<?php

namespace TexLab\R;

use Exception;

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
        $this->setExecutePath($path ?? PHP_OS_FAMILY === 'Windows' ? 'Rscript.exe' : 'Rscript');
    }

    /**
     * @param string $script
     * @return string
     * @throws Exception
     * @SuppressWarnings(PHPMD.UndefinedVariable)
     */
    public function run(string $script)
    {
        $temp = tmpfile();

        if ($temp === false) {
            throw new Exception('Error creating temporary file.');
        }

        fwrite($temp, $script);

        exec(
            "$this->path " . stream_get_meta_data($temp)['uri'],
            $output,
            $returnVar
        );

        if ($returnVar !== 0) {
            throw new Exception('Error execution R code.');
        }

        fclose($temp);

        return join("\n", $output);
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setExecutePath(string $path)
    {
        $this->path = $path;
        return $this;
    }
}
