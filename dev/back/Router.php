<?php

namespace Router;

use Result\Result;
use validator\ControllerValidator\ControllerValidator;
use validator\TypeValidator\TypeValidator;
use validator\UriValidator\UriValidator;

class Router
{
    public function __construct()
    {
        $this->mResult = new Result('');
        $this->mUri = new Result('');
        $this->mType = new Result('');
        $this->mController = new Result('');
        $this->mNext = true;
    }

    public function execute(): void
    {
        $this->uri()
            ->type()
            ->controller()
            ->route()
            ->response();
    }

    private function uri(): Router
    {
        $result = (new UriValidator())->validate();
        $this->mResult = $result;
        $this->mUri = $result;
        return $this;
    }

    private function type(): Router
    {
        if ($this->mResult->getStatus()) {
            $uri = $this->mUri->getData();
            $result = (new TypeValidator($uri))->validate();
            $this->mResult = $result;
            $this->mType = $result;
            $this->mNext = !empty($this->mResult->getData());
        }
        return $this;
    }

    private function controller(): Router
    {
        if ($this->mNext && $this->mResult->getStatus()) {
            $uri = $this->mUri->getData();
            $type = $this->mType->getData();
            $result = (new ControllerValidator($uri, $type))->validate();
            $this->mResult = $result;
            $this->mController = $result;
        }
        return $this;
    }

    private function route(): Router
    {
        if ($this->mNext && $this->mResult->getStatus()) {
            $cls = $this->mController->getData();
            $method = $this->mType->getData();
            $uri = $this->mUri->getData();
            $this->mResult = call_user_func([new $cls($uri), $method]);
        }

        return $this;
    }

    private function response(): void
    {
        echo json_encode($this->mResult->serialize());
    }

    private Result $mUri;
    private Result $mType;
    private Result $mController;
    private Result $mResult;
    private bool $mNext;
}