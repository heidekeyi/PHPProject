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
            ->json();
    }

    private function uri(): Router
    {
        $this->mResult
            = $this->mUri
            = (new UriValidator())->validate();
        return $this;
    }

    private function type(): Router
    {
        if ($this->mResult->mStatus) {
            $this->mResult
                = $this->mType
                = (new TypeValidator($this->mUri->mData))->validate();
            $this->mNext = !empty($this->mResult->mData);
        }
        return $this;
    }

    private function controller(): Router
    {
        if ($this->mNext && $this->mResult->mStatus) {
            $this->mResult
                = $this->mController
                = (new ControllerValidator($this->mUri->mData, $this->mType->mData))->validate();
        }
        return $this;
    }

    private function route(): Router
    {
        if ($this->mNext && $this->mResult->mStatus) {
            $cls = $this->mController->mData;
            $method = $this->mType->mData;
            $this->mResult = call_user_func([new $cls($this->mUri->mData), $method]);
        }

        return $this;
    }

    private function json(): void
    {
        echo json_encode($this->mResult);
    }

    private Result $mUri;
    private Result $mType;
    private Result $mController;
    private Result $mResult;
    private bool $mNext;
}