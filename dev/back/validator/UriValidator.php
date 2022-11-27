<?php

namespace daily\validator\UriValidator;

use daily\IValidator\IValidator;
use daily\Result\Result;

class UriValidator implements IValidator
{
    public function __construct()
    {
        $this->result = new Result('');
    }

    public function validate(): Result
    {
        return $this->result;
    }

    private function empty(): UriValidator
    {
        return $this;
    }

    private Result $result;
}