<?php

namespace daily\validator\UriValidator;


use daily\Result\Result;
use daily\validator\IValidator\IValidator;

class UriValidator implements IValidator
{
    public function __construct()
    {
        $this->result = new Result('');
    }

    public function validate(): Result
    {
        return $this->empty()->result;
    }

    private function empty(): UriValidator
    {
        $this->result->message('uri is empty')->status(false);
        return $this;
    }

    private Result $result;
}