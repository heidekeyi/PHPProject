<?php

namespace model\CInsertModel;

use CDB\CDB;
use CResult\CResult;

class CInsertModel
{
    public function __construct()
    {
        $this->CDB = new CDB();
    }

    public function unique(): CInsertModel
    {
        return $this;
    }

    public function exist()
    {

    }

    public function result(): CResult
    {
        return $this->result;
    }

    private CDB $CDB;
    private CResult $result;
}