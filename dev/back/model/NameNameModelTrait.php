<?php

namespace model\trait\NameNameModelTrait;

use model\trait\ModelTrait\ModelTrait;

trait NameNameModelTrait
{
    use ModelTrait;

    public function name(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }
}