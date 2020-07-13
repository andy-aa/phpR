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

    public function run(string $script = null): string
    {
        if ($script !== null) {
            $this->setScript($script);
        }

        return join("\n", $this->runner->run($this->getFullScript()));
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