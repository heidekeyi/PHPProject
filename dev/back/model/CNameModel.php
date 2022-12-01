<?php

namespace model\CNameModel;

use CResult\CResult;
use field\CNameField\CNameField;

class CNameModel
{
    public function __construct()
    {
        $this->field = new CNameField();
    }

    public function insert(array $data): CResult
    {
        return new CResult($data);
    }

    public function field(): CNameField
    {
        return $this->field;
    }

    private CNameField $field;
}