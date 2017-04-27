<?php

namespace Sensorario\Container;

class ArgumentBuilder
{
    private $container;

    private $params;

    public function __construct()
    {
        $this->params = [];
    }

    public function setContainer($container)
    {
        $this->container = $container;
    }

    public function setParams(array $params)
    {
        $this->params = $params;

        return $this;
    }

    public function getArguments()
    {
        $arguments = [];

        if (!$this->container) {
            throw new \RuntimeException(
                'Oops! Container is not defined'
            );
        }

        foreach ($this->params as $instanceParam) {
            $arguments[] = $this->container->get($instanceParam);
        }

        return $arguments;
    }
}
