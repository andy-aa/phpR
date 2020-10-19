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
    public function run(string $script)
    {
        $temp = tmpfile();

        if ($temp !== false) {

            fwrite($temp, $script);

            exec(
                "$this->path " . stream_get_meta_data($temp)['uri'],
                $output
            );

            fclose($temp);

            return join("\n", $output);
        } else {
            return '';
        }

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