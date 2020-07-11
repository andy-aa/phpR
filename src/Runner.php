<?php

namespace TexLab\R;

class Runner
{
    protected $path;

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
     * @return array
     */
    public function run(string $script): array
    {
        $temp = tmpfile();

        fwrite($temp, $script);

        exec(
            "$this->path " . stream_get_meta_data($temp)['uri'],
            $output
        );

        fclose($temp);

        return $output;

    }

    /**
     * @param string $path
     * @return Runner
     */
    public function setPath(string $path)
    {
        $this->path = $path;
        return $this;
    }

}