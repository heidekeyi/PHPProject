<?php

namespace validator\ControllerValidator;

use Result\Result;
use validator\IValidator\IValidator;

class ControllerValidator implements IValidator
{
    public function __construct(string $uri, string $type)
    {
        $this->mResult = new Result('');
        $this->mUri = preg_replace('/(\/\d+$)?/', '', $uri);
        $this->mType = $type;
    }

    public function validate(): Result
    {
        $dir = 'controller';
        $name = preg_replace('/(\w+\/)+(\w+$)/', '$2', $this->mUri);
        $name = ucwords($name) . ucwords($this->mType) . ucwords($dir);
        $uri = preg_replace("/\w+$/", $name, $this->mUri);
        $cls = [
            $dir,
            $this->mType,
            ...explode('/', $uri),
            $name
        ];
        $cls = implode('\\', $cls);
        if (class_exists($cls)) {
            $this->mResult->data($cls);
        } else {
            $this->mResult->error('controller is not exist');
        }
        return $this->mResult;
    }

    private Result $mResult;
    readonly private string $mUri;
    readonly private string $mType;
}