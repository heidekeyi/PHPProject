<?php

namespace controller\select\ISelectController;

use Result\Result;

interface ISelectController
{
    public function select(): Result;
}