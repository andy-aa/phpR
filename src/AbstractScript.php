<?php


namespace TexLab\R;


abstract class AbstractScript
{
    protected string $header = '';
    protected string $script = '';
    protected string $footer = '';

    /**
     * @return $this|object
     */
    public function reset(): object
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

    /**
     * @param string $header
     * @return $this|object
     */
    public function setHeader(string $header): object
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @param string $header
     * @return $this|object
     */
    public function addHeader(string $header): object
    {
        $this->header .= $header;
        return $this;
    }

    /**
     * @param string $footer
     * @return $this|object
     */
    public function setFooter(string $footer): object
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @param string $footer
     * @return $this|object
     */
    public function addFooter(string $footer): object
    {
        $this->footer .= $footer;
        return $this;
    }

    /**
     * @param string $script
     * @return $this|object
     */
    public function setScript(string $script): object
    {
        $this->script = $script;
        return $this;
    }

    /**
     * @param string $script
     * @return $this|object
     */
    public function addScript(string $script): object
    {
        $this->script .= $script;
        return $this;
    }
}