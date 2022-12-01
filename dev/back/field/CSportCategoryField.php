<?php

namespace field\CSportCategoryField;


use field\TNameField\TNameField;
use field\TNameIdField\TNameIdField;

class CSportCategoryField
{
    use TNameField;
    use TNameIdField;

    public function unitId(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }

    public function unitName(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }
}