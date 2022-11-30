<?php

namespace controller\time\CTimeRecordController;

use controller\IListController\IListController;
use controller\IRestController\IRestController;
use CResult\CResult;

class CTimeRecordController implements IRestController, IListController
{
    public function list(): CResult
    {
        return new CResult(__METHOD__);
    }

    public function select(): CResult
    {
        return new CResult(__METHOD__);
    }

    public function delete(): CResult
    {
        return new CResult(__METHOD__);
    }

    public function update(): CResult
    {
        return new CResult(__METHOD__);
    }

    public function insert(): CResult
    {
        return new CResult(__METHOD__);
    }
}