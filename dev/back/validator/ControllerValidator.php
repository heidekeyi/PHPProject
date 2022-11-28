<?php

namespace validator\ControllerValidator;

use Result\Result;
use validator\IValidator\IValidator;

class ControllerValidator implements IValidator
{
    public function __construct(string $uri, string $type)
    {
        $this->result = new Result('');
        $this->uri = preg_replace('/(\/\d+$)?/', '', $uri);
        $this->type = $type;
    }

    public function validate(): Result
    {
        $dir = 'controller';
        $name = preg_replace('/(\w+\/)+(\w+$)/', '$2', $this->uri);
        $name = ucwords($name) . ucwords($this->type) . ucwords($dir);
        $uri = preg_replace("/\w+$/", $name, $this->uri);
        $cls = [
            $dir,
            $this->type,
            ...explode('/', $uri),
            $name
        ];
        $cls = implode('\\', $cls);
        if (class_exists($cls)) {
            $this->result->data($cls);
        } else {
            $this->result->error('controller is not exist');
        }
        return $this->result;
    }

    private Result $result;
    readonly private string $uri;
    readonly private string $type;
}