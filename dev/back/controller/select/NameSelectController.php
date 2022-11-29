<?php

namespace controller\select\NameSelectController;

use controller\select\SelectController\SelectController;
use Result\Result;
use model\NameModel\NameModel;
class NameSelectController extends SelectController
{
    protected function one(): Result
    {
        $m = new NameModel();
        return new Result([
            $m->table()
        ]);
    }

    protected function many(): Result
    {
        return new Result(__FUNCTION__);
    }
}