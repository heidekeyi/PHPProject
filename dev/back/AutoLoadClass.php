<?php

namespace AutoLoadClass;

class AutoLoadClass
{
    static protected bool $once = false;

    static protected function register(): void
    {
        if (static::$once) {
            return;
        }
        static::$once = true;
        spl_autoload_register(function (string $cls) {
            $cls = preg_replace("/\\\\\w+$/", '', $cls);
            $filename = __DIR__ . '/' . $cls . '.php';
            $filename = str_replace('\\', '/', $filename);
            if (file_exists($filename)) {
                include_once $filename;
            }
        });
    }

    public function __invoke(): void
    {
        static::register();
    }
}

return new AutoLoadClass();