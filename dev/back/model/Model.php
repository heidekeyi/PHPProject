<?php

namespace model\Model;

class Model
{
    static protected array $msConfig;
    static protected string $msGlue = '_';
    static protected string $msTableName = '';
    static protected array $msTableNamePrefixes = ['daily'];

    public function table(): string
    {
        return implode(static::$msGlue, [
            ...static::$msTableNamePrefixes,
            static::$msTableName
        ]);
    }

    public function id(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }

    public function createTime(bool $complete): string
    {
        return $this->complete(__FUNCTION__, $complete);
    }

    protected function complete(string $name, bool $complete): string
    {
        if ($complete) {
            $name = implode(static::$msGlue, [$this->table(), $name]);
        }
        return $name;
    }

    protected function config(): array
    {
        if (empty(static::$msConfig)) {
            static::$msConfig = (include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config.php')();
        }
        return static::$msConfig;
    }
}