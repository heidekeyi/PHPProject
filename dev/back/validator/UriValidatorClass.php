<?php

namespace validator\UriValidatorClass;


use ResultClass\ResultClass;
use validator\ValidatorInterface\ValidatorInterface;

class UriValidatorClass implements ValidatorInterface
{
    public function __construct()
    {
        $this->mUri = trim($_SERVER['PATH_INFO'] ?? '', '/');
        $this->mResult = new ResultClass($this->mUri);
    }

    public function validate(): ResultClass
    {
        return $this->empty()->rule()->mResult;
    }

    private function empty(): UriValidatorClass
    {
        if (empty($this->mUri)) {
            $this->mResult->error('uri is empty');
        }
        return $this;
    }

    private function rule(): UriValidatorClass
    {
        if (!preg_match('/^[a-z]{3,18}(\/[a-z]{3,18}){0,3}(\/[1-9]\d{0,17})*$/', $this->mUri)) {
            $this->mResult->error('uri is invalid');
        }
        return $this;
    }

    private ResultClass $mResult;
    readonly private string $mUri;
}