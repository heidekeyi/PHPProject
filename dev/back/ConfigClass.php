<?php

namespace ConfigClass;

class ConfigClass
{
    static protected array $msConfig = [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'dbname' => 'dev',
        'charset' => 'utf8',
        'username' => 'root',
        'password' => '',
        'project' => 'daily'
    ];

    public function driver(): string
    {
        return $this->retrieve(__FUNCTION__);
    }

    public function host(): string
    {
        return $this->retrieve(__FUNCTION__);
    }

    public function port(): string
    {
        return $this->retrieve(__FUNCTION__);
    }

    public function dbname(): string
    {
        return $this->retrieve(__FUNCTION__);
    }

    public function charset(): string
    {
        return $this->retrieve(__FUNCTION__);
    }

    public function username(): string
    {
        return $this->retrieve(__FUNCTION__);
    }

    public function password(): string
    {
        return $this->retrieve(__FUNCTION__);
    }

    public function project(): string
    {
        return $this->retrieve(__FUNCTION__);
    }

    protected function retrieve($field): string
    {
        return static::$msConfig[$field] ?? '';
    }
}