<?php


namespace TexLab\R;


class Script extends AbstractScript
{

    protected Converter $converter;
    protected RunnerInterface $runner;

    public function __construct(RunnerInterface $runner)
    {
        $this->converter = new Converter();
        $this->runner = $runner;
    }

    public function run():string
    {
        return join("\n", $this->runner->run($this->getFullScript()));
    }

    public function addVector(string $name, array $data)
    {
        $this->addHeader($this->converter->vector($name, $data));
        return $this;
    }

    public function addDataFrame(string $name, array $data)
    {
        $this->addHeader($this->converter->dataFrame($name, $data));
        return $this;
    }

}