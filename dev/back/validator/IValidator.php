<?php

namespace validator\IValidator;

use Result\Result;

interface IValidator
{
    public function validate(): Result;
}