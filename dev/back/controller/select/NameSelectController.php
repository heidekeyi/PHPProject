<?php

namespace controller\select\NameSelectController;

use controller\select\SelectController\SelectController;
use Result\Result;

class NameSelectController extends SelectController
{
    protected function one(): Result
    {
        return new Result(__FUNCTION__);
    }

    protected function many(): Result
    {
        return new Result(__FUNCTION__);
    }
}