<?php

namespace daily\Router;

class Router
{
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function route(): void
    {
        echo json_encode($this->config);
    }

    private array $config;
}