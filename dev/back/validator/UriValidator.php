<?php

namespace daily\validator\UriValidator;


use daily\Result\Result;
use daily\validator\IValidator\IValidator;

class UriValidator implements IValidator
{
    public function __construct()
    {
        $this->uri = trim($_SERVER['PATH_INFO'] ?? '', '/');
        $this->result = new Result($this->uri);
    }

    public function validate(): Result
    {
        return $this->empty()->rule()->result;
    }

    private function empty(): UriValidator
    {
        if (empty($this->uri)) {
            $this->result
                ->message('uri is empty')
                ->status(false);
        }
        return $this;
    }

    private function rule(): UriValidator
    {
        if (!preg_match('/^[a-z]{3,18}(\/[a-z]{3,18}){0,3}(\/[1-9]\d{0,17})*$/', $this->uri)) {
            $this->result
                ->message('uri is invalid')
                ->status(false);
        }
        return $this;
    }

    private Result $result;
    private string $uri;
}