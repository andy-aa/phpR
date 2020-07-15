<?php


namespace TexLab\R;


class Script extends AbstractScript
{

    protected string $prefix = 'php_';

    protected Converter $converter;
    protected RunnerInterface $runner;

    public function __construct(RunnerInterface $runner)
    {
        $this->converter = new Converter();
        $this->runner = $runner;
    }


    protected function parseVars(string $result)
    {
        preg_match_all("/(php_(.*)) = (.*)(\n|$)/", $result, $matches);

        return array_combine(
            $matches[1],
            $matches[3]
        );
    }

    public function run(string $script = null): array
    {
        if ($script !== null) {
            $this->setScript($script);
        }

//        $result = join("\n", $this->runner->run($this->getFullScript()));
//        $result = $this->runner->run($this->getFullScript());

        return $this->parseVars($this->runner->run($this->getFullScript()));

    }

    /**
     * @param string $name
     * @param array $data
     * @return $this|object
     */
    public function addVector(string $name, array $data): object
    {
        $this->addHeader($this->converter->vector($name, $data));
        return $this;
    }

    public function addDataFrame(string $name, array $data): object
    {
        $this->addHeader($this->converter->dataFrame($name, $data));
        return $this;
    }

}