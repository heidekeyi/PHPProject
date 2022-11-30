<?php

namespace validator\ControllerValidatorClass;

use ResultClass\ResultClass;
use validator\ValidatorInterface\ValidatorInterface;

class ControllerValidatorClass implements ValidatorInterface
{
    public function __construct(string $uri)
    {
        $this->mResult = new ResultClass('');
        $this->mUri = preg_replace('/(\/\d+$)?/', '', $uri);
    }

    public function validate(): ResultClass
    {
        $crumb = 'controller';
        $type = 'Class';
        $uri = ucwords($this->mUri, '/');
        $uri = str_replace('/', '', $uri);
        $name = $uri . ucwords($crumb) . $type;
        $cls = implode('\\', [$crumb, $name,$name]);
        if (class_exists($cls)) {
            $this->mResult->setData($cls);
        } else {
            $this->mResult->error('controller is not exist');
        }
        return $this->mResult;
    }

    private ResultClass $mResult;
    readonly private string $mUri;
}