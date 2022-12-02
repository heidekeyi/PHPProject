<?php

namespace model\CExistModel;

use CResult\CResult;
use field\IField\IField;
use model\CFetchModel\CFetchModel;

class CExistModel
{
    public function field(string $table, string $field, string $value): CResult
    {
        $model = new CFetchModel();
        $result = $model->equal($table, $field, $value);
        if (!$result->getStatus()) {
            return $result;
        }
        if (empty($result->getData())) {
            $result->error($field . '=' . $value . ' is not exist');
        }
        return $result;
    }

    public function id(IField $field, string $value): CResult
    {
        return $this->field($field->table(true), $field->id(true), $value);
    }
}