<?php

namespace model\DescriptionModel;

use model\Model\Model;

class DescriptionModel extends Model
{
    protected static string $msTableName = 'description';

    public function desc(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }
}