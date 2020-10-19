<?php

namespace TexLab\R;

class Runner implements RunnerInterface
{
    protected string $path = '';

    /**
     * Runner constructor.
     * @param string|null $path
     */
    public function __construct(string $path = null)
    {
        if ($path !== null) {
            $this->setPath($path);
        }
    }

    /**
     * @param string $script
     * @return string
     */
    public function run(string $script): string
    {
        $temp = tmpfile();

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
     * @return $this|object
     */
    public function setPath(string $path): object
    {
        $this->path = $path;
        return $this;
    }

}