<?php

namespace validator\ControllerValidator;

use Result\Result;
use validator\IValidator\IValidator;

class ControllerValidator implements IValidator
{
    public function __construct(string $uri, string $type)
    {
        $this->result = new Result('');
        $this->uri = $uri;
        $this->type = $type;
    }

    public function validate(): Result
    {
        return $this->result;
    }

    private Result $result;
    readonly private string $uri;
    readonly private string $type;
}