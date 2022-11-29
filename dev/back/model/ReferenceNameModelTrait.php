<?php

namespace model\trait\ReferenceNameModelTrait;

use model\trait\NameIdModelTrait\NameIdModelTrait;
use model\trait\NameNameModelTrait\NameNameModelTrait;

trait ReferenceNameModelTrait
{
    use NameNameModelTrait;
    use NameIdModelTrait;
}