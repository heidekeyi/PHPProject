<?php

namespace controller\select\DescriptionSelectController;

use controller\select\SelectController\SelectController;
use Result\Result;
use model\DescriptionModel\DescriptionModel;

class DescriptionSelectController extends SelectController
{
    protected function many(): Result
    {
        $model = new DescriptionModel();
        return new Result([
            $model->table(),
            $model->id(false) => $model->id(true),
            $model->createTime(false) => $model->createTime(true),
            $model->desc(false) => $model->desc(true),
        ]);
    }

    protected function one(): Result
    {
        return new Result(__METHOD__);
    }
}