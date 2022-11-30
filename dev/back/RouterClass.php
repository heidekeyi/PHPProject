<?php

namespace RouterClass;

use ResultClass\ResultClass;
use validator\ControllerValidatorClass\ControllerValidatorClass;
use validator\TypeValidatorClass\TypeValidatorClass;
use validator\UriValidatorClass\UriValidatorClass;

class RouterClass
{
    public function __construct()
    {
        $this->mResult = new ResultClass('');
        $this->mUri = new ResultClass('');
        $this->mType = new ResultClass('');
        $this->mController = new ResultClass('');
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

    private function uri(): RouterClass
    {
        $result = (new UriValidatorClass())->validate();
        $this->mResult = $result;
        $this->mUri = $result;
        return $this;
    }

    private function type(): RouterClass
    {
        if ($this->mResult->getStatus()) {
            $uri = $this->mUri->getData();
            $result = (new TypeValidatorClass($uri))->validate();
            $this->mResult = $result;
            $this->mType = $result;
            $this->mNext = !empty($this->mResult->getData());
        }
        return $this;
    }

    private function controller(): RouterClass
    {
        if ($this->mNext && $this->mResult->getStatus()) {
            $uri = $this->mUri->getData();
            $result = (new ControllerValidatorClass($uri))->validate();
            $this->mResult = $result;
            $this->mController = $result;
        }
        return $this;
    }

    private function route(): RouterClass
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

    private ResultClass $mUri;
    private ResultClass $mType;
    private ResultClass $mController;
    private ResultClass $mResult;
    private bool $mNext;
}