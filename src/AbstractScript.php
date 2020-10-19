<?php


namespace TexLab\R;


abstract class AbstractScript
{
    protected string $header = '';
    protected string $script = '';
    protected string $footer = <<<'FOOTER'

for(i in ls()[startsWith(ls(), "php_")]){
 	cat(paste0(i, " = ", get(i), "\n"), sep = "")
}
FOOTER;


    /**
     * @return $this
     */
    public function reset()
    {
        return $this
            ->setHeader('')
            ->setScript('')
            ->setFooter('');
    }

    /**
     * @return string
     */
    public function getFullScript(): string
    {
        return $this->header . $this->script . $this->footer;
    }

    /**
     * @param string $header
     * @return $this
     */
    public function setHeader(string $header)
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @param string $header
     * @return $this
     */
    public function addHeader(string $header)
    {
        $this->header .= $header;
        return $this;
    }

    /**
     * @param string $footer
     * @return $this
     */
    public function setFooter(string $footer)
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @param string $footer
     * @return $this
     */
    public function addFooter(string $footer)
    {
        $this->footer .= $footer;
        return $this;
    }

    /**
     * @param string $script
     * @return $this
     */
    public function setScript(string $script)
    {
        $this->script = $script;
        return $this;
    }

    /**
     * @param string $script
     * @return $this
     */
    public function addScript(string $script)
    {
        $this->script .= $script;
        return $this;
    }
}