<?php


namespace TexLab\R;


class Converter
{
    public function vector(string $name, array $data): string
    {
        return "$name <- c(" . join(', ', $data) . ");\n";
    }

    public function dataFrame(string $name, array $data): string
    {
        $columns = [];
        foreach ($data as $key => $value) {
            $columns[] = "$key = c(" . join(', ', $value) . ")";
        }

        return "$name <- data.frame(" . join(', ', $columns) . ");\n";
    }

}