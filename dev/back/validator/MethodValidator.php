<?php

namespace daily\validator\MethodValidator;

use daily\Result\Result;
use daily\validator\IValidator\IValidator;

class MethodValidator implements IValidator
{
    public function __construct(string $controller, string $type)
    {
        $this->result = new Result('');
        $this->controller = $controller;
        $this->type = $type;
    }

    public function validate(): Result
    {
        return $this->result;
    }

    private Result $result;
    readonly private string $controller;
    readonly private string $type;
}