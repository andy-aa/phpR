<?php


namespace TexLab\R;


class Converter
{
    /**
     * @param string $name
     * @param array<mixed> $data
     * @return string
     */
    public function vector(string $name, array $data)
    {
        return "$name <- c(" . join(', ', $data) . ");\n";
    }

    /**
     * @param string $name
     * @param array<array<mixed>> $data
     * @return string
     */
    public function dataFrame(string $name, array $data)
    {
        $columns = [];
        foreach ($data as $key => $value) {
            $columns[] = "$key = c(" . join(', ', $value) . ")";
        }

        return "$name <- data.frame(" . join(', ', $columns) . ");\n";
    }

}