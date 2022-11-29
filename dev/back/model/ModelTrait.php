<?php

namespace model\trait\ModelTrait;

use Config\Config;

trait ModelTrait
{
    public function __construct()
    {
        $table = preg_replace('/(\w+\\\\)*(\w+)Model$/', '$2', static::class);
        $this->mTable = lcfirst($table);
        $this->mConfig = new Config();
    }

    public function table(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }

    public function id(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }

    public function createTime(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }

    private function complete(string $name, bool $complete): string
    {
        $field = implode('_', [
            $this->mConfig->project(),
            $this->mTable,
            $name
        ]);
        return $complete ? $field : $name;
    }

    private string $mTable;
    private Config $mConfig;
}