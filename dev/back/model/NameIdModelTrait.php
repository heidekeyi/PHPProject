<?php

namespace model\trait\NameIdModelTrait;

use model\trait\ModelTrait\ModelTrait;

trait NameIdModelTrait
{
    use ModelTrait;

    public function nameId(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }
}