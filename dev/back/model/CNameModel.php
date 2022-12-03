<?php

namespace model\CNameModel;

use CResult\CResult;
use field\CNameField\CNameField;
use model\CInsertModel\CInsertModel;

class CNameModel
{
    public function __construct()
    {
        $this->field = new CNameField();
    }

    public function insert(array $data): CResult
    {
        $field = $this->field();
        $data = [$field->name(true) => time() . ''];
        return (new CInsertModel($data))
            ->unique($field, [$field->name(true)])
            ->insert($field);
    }

    public function field(): CNameField
    {
        return $this->field;
    }

    private CNameField $field;
}