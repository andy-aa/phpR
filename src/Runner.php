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
     */
    public function run(string $script)
    {
        if (($temp = tmpfile()) === false) {
            throw new Exception('Error creating temporary file.');
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
    public function setExecutePath(string $path)
    {
        $this->path = $path;
        return $this;
    }
}
