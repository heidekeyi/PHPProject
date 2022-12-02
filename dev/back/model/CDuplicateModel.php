<?php

namespace model\CDuplicateModel;

use CResult\CResult;
use model\CFetchModel\CFetchModel;

class CDuplicateModel
{
    public function duplicate(string $table, string $field, string $value): CResult
    {
        $model = $this->model();
        return $model->equal($table, $field, $value);
    }

    public function duplicates(string $table, array $map): CResult
    {

    }

    public function model(): CFetchModel
    {
        return new CFetchModel();
    }
}