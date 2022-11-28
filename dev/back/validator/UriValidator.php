<?php

namespace validator\UriValidator;


use Result\Result;
use validator\IValidator\IValidator;

class UriValidator implements IValidator
{
    public function __construct()
    {
        $this->mUri = trim($_SERVER['PATH_INFO'] ?? '', '/');
        $this->mResult = new Result($this->mUri);
    }

    public function validate(): Result
    {
        return $this->empty()->rule()->mResult;
    }

    private function empty(): UriValidator
    {
        if (empty($this->mUri)) {
            $this->mResult->error('uri is empty');
        }
        return $this;
    }

    private function rule(): UriValidator
    {
        if (!preg_match('/^[a-z]{3,18}(\/[a-z]{3,18}){0,3}(\/[1-9]\d{0,17})*$/', $this->mUri)) {
            $this->mResult->error('uri is invalid');
        }
        return $this;
    }

    private Result $mResult;
    private string $mUri;
}