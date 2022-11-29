<?php

namespace controller\select\UnitSelectController;

use controller\select\SelectController\SelectController;
use model\UnitModel\UnitModel;
use Result\Result;

class UnitSelectController extends SelectController
{
    protected function one(): Result
    {
        return new Result('');
    }

    protected function many(): Result
    {
        $model = new UnitModel();
        return new Result([
            $model->table(false) => $model->table(true),
            $model->id(false) => $model->id(true),
            $model->createTime(false) => $model->createTime(true),
            $model->name(false) => $model->name(true),
            $model->nameId(false) => $model->nameId(true),
        ]);
    }
}