<?php

namespace field\TField;

use CConfig\CConfig;

trait TField
{
    public function __construct()
    {
        $table = preg_replace('/^(\w+\\\\)*(\w+)Field$/', '$2', static::class);
        $table = preg_replace('/^C/', '', $table);
        $this->table = lcfirst($table);
        $this->config = new CConfig();
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
        if ($complete) {
            $list = [$this->config->project(),
                $this->table];
            if ($name !== 'table') {
                $list[] = $name;
            }
            $name = implode('_', $list);
        }
        return $name;
    }

    readonly private string $table;
    readonly private CConfig $config;
}