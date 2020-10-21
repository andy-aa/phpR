<?php

namespace TexLab\R;

class Script extends AbstractScript
{
    /**
     * @var Converter
     */
    protected Converter $converter;

    /**
     * @var RunnerInterface
     */
    protected RunnerInterface $runner;

    public function __construct(RunnerInterface $runner)
    {
        parent::__construct();
        $this->converter = new Converter();
        $this->runner = $runner;
    }

    /**
     * @param string|null $script
     * @return array<mixed, mixed>
     */
    public function run(string $script = null)
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
     * @param array<mixed> $data
     * @return $this
     */
    public function addVector(string $name, array $data)
    {
        $this->addHeader($this->converter->vector($name, $data));
        return $this;
    }

    /**
     * @param string $name
     * @param array<array<mixed>> $data
     * @return $this
     */
    public function addDataFrame(string $name, array $data)
    {
        $this->addHeader($this->converter->dataFrame($name, $data));
        return $this;
    }
}
