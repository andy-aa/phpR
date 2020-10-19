<?php


namespace TexLab\R;


class Script extends AbstractScript
{

    /**
     * @var string
     */
    protected string $prefix = 'php_';

    /**
     * @var Converter
     */
    protected $converter;

    /**
     * @var RunnerInterface
     */
    protected $runner;

    public function __construct(RunnerInterface $runner)
    {
        $this->converter = new Converter();
        $this->runner = $runner;
    }


    /**
     * @param string $result
     * @return array<mixed, mixed>
     */
    protected function parseVars(string $result)
    {
        preg_match_all("/(php_(.*)) = (.*)(\n|$)/", $result, $matches);


        return (array)array_combine(
            $matches[1],
            $matches[3]
        );
    }

    /**
     * @param string $script
     * @return array<mixed, mixed>
     */
    public function run(string $script = '')
    {
        if ($script !== '') {
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