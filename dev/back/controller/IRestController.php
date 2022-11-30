<?php

namespace controller\IRestController;

use CResult\CResult;

interface IRestController
{
    public function insert(): CResult;

    public function delete(): CResult;

    public function update(): CResult;

    public function select(): CResult;
}