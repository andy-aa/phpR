<?php


namespace TexLab\R;


abstract class AbstractScript
{
    protected string $header = '';
    protected string $script = '';
    protected string $footer = '';

    public function reset()
    {
        return $this
            ->setHeader('')
            ->setScript('')
            ->setFooter('');
    }

    public function getFullScript(): string
    {
        return $this->header . $this->script . $this->footer;
    }

    public function setHeader(string $header)
    {
        $this->header = $header;
        return $this;
    }


    public function addHeader(string $header)
    {
        $this->header .= $header;
        return $this;
    }


    public function setFooter(string $footer)
    {
        $this->footer = $footer;
        return $this;
    }


    public function addFooter(string $footer)
    {
        $this->footer .= $footer;
        return $this;
    }


    public function setScript(string $script)
    {
        $this->script = $script;
        return $this;
    }


    public function addScript(string $script)
    {
        $this->script .= $script;
        return $this;
    }
}