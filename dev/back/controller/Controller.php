<?php

namespace controller\Controller;

class Controller
{
    public function __construct(string $uri)
    {
        $this->id = preg_replace('/^[a-z\/]+/', '', $uri);
    }

    protected function id(): string
    {
        return $this->id;
    }

    readonly private string $id;
}