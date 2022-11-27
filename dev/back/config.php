<?php

namespace daily\Config;

return function (): array {
    return [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'dbname' => 'dev',
        'charset' => 'utf8',
        'username' => 'root',
        'password' => '',
        'project' => 'daily'
    ];
};