<?php

namespace model\trait\CategoryModelTrait;

use model\trait\ModelTrait\ModelTrait;

trait CategoryModelTrait
{
    use ModelTrait;

    public function categoryName(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }

    public function categoryId(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }
}