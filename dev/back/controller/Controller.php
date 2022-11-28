<?php

namespace controller\Controller;

class Controller
{
    public function __construct(string $uri)
    {
        $this->mId = preg_replace('/^[a-z\/]+/', '', $uri);
    }

    protected function id(): string
    {
        return $this->mId;
    }

    readonly private string $mId;
}