<?php

namespace model\trait\ParentModelTrait;

use model\trait\ModelTrait\ModelTrait;

trait ParentModelTrait
{
    use ModelTrait;

    public function parentId(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }

    public function parentName(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }
}