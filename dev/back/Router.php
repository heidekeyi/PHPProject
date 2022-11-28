<?php

namespace Router;

use Result\Result;
use validator\ControllerValidator\ControllerValidator;
use validator\MethodValidator\MethodValidator;
use validator\TypeValidator\TypeValidator;
use validator\UriValidator\UriValidator;

class Router
{
    public function __construct()
    {
        $this->result = new Result('');
        $this->uri = new Result('');
        $this->type = new Result('');
        $this->controller = new Result('');
        $this->method = new Result('');
        $this->next = true;
    }

    public function execute(): void
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
            $this->next = !empty($this->result->data);
        }
        return $this;
    }

    private function controller(): Router
    {
        if ($this->next && $this->result->status) {
            $this->result
                = $this->controller
                = (new ControllerValidator($this->uri->data, $this->type->data))->validate();
        }
        return $this;
    }

    private function method(): Router
    {
        if ($this->next && $this->result->status) {
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
    private bool $next;
}