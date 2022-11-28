<?php

namespace daily\validator\IValidator;

use daily\Result\Result;

interface IValidator
{
    public function validate(): Result;
}