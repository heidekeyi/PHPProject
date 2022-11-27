<?php

namespace daily\IValidator;

use daily\Result\Result;

interface IValidator
{
    public function validate(): Result;
}