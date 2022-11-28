<?php

namespace daily\Router;

use daily\Result\Result;
use daily\validator\ControllerValidator\ControllerValidator;
use daily\validator\MethodValidator\MethodValidator;
use daily\validator\TypeValidator\TypeValidator;
use daily\validator\UriValidator\UriValidator;

class Router
{
    public function __construct()
    {
        $this->result = new Result('');
        $this->uri = new Result('');
        $this->type = new Result('');
        $this->controller = new Result('');
        $this->method = new Result('');
    }

    public function route(): void
    {
        $this->uri()
            ->type()
            ->controller()
            ->method()
            ->json();
    }

    private function uri(): Router
    {
        $this->result
            = $this->uri
            = (new UriValidator())->validate();
        return $this;
    }

    private function type(): Router
    {
        if ($this->result->status) {
            $this->result
                = $this->type
                = (new TypeValidator($this->uri->data))->validate();
        }
        return $this;
    }

    private function controller(): Router
    {
        if ($this->result->status) {
            $this->result
                = $this->controller
                = (new ControllerValidator($this->uri->data, $this->type->data))->validate();
        }
        return $this;
    }

    private function method(): Router
    {
        if ($this->result->status) {
            $this->result
                = $this->method
                = (new MethodValidator($this->controller->data, $this->type->data))->validate();
        }
        return $this;
    }

    private function json(): void
    {
        echo json_encode($this->result);
    }

    private Result $uri;
    private Result $type;
    private Result $controller;
    private Result $method;
    private Result $result;
}