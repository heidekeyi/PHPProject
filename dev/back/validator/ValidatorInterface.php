<?php

namespace validator\ValidatorInterface;

use ResultClass\ResultClass;


interface ValidatorInterface
{
    public function validate(): ResultClass;
}