<?php

namespace daily\validator\TypeValidator;

use daily\Result\Result;
use daily\validator\IValidator\IValidator;

class TypeValidator implements IValidator
{
    public function __construct(string $uri)
    {
        $this->result = new Result('');
        $this->uri = $uri;
    }

    public function validate(): Result
    {
        return $this->result;
    }

    private Result $result;
    readonly private string $uri;
}