<?php

namespace TexLab\R;

use Exception;

abstract class AbstractScript
{
    protected string $header = '';
    protected string $script = '';
    protected string $footer = '';

    /**
     * @var string
     */
    protected string $prefix = 'php_';

    public function __construct()
    {
        $this->setFooter(<<<FOOTER

for(i in ls()[startsWith(ls(), "$this->prefix")]){
 	cat(paste0(i, " = ", get(i), "\n"), sep = "")
}
FOOTER
        );
    }

    /**
     * @param string $scriptOutput
     * @return array<string, string>
     * @throws Exception
     * @SuppressWarnings(PHPMD.UndefinedVariable)
     */
    protected function parseVars(string $scriptOutput)
    {
        preg_match_all("/($this->prefix(.*)) = (.*)(\n|$)/", $scriptOutput, $matches);

        $result = array_combine(
            $matches[1],
            $matches[3]
        );

        if ($result === false) {
            throw new Exception('Error parsing results.');
        }

        return $result;
    }

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
