<?php

namespace controller\select\SelectController;

use controller\Controller\Controller;
use controller\select\ISelectController\ISelectController;
use Result\Result;

abstract class SelectController extends Controller implements ISelectController
{
    public function select(): Result
    {
        if (empty($this->id())) {
            return $this->many();
        } else {
            return $this->one();
        }
    }

    abstract protected function one(): Result;

    abstract protected function many(): Result;
}