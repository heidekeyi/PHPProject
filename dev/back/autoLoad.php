<?php

namespace autoLoad;

return function (): void {
    spl_autoload_register(function (string $cls) {
        $cls = preg_replace("/\\\\\w+$/", '', $cls);
        $filename = __DIR__ . '/' . $cls . '.php';
        $filename = str_replace('\\', '/', $filename);
        if (file_exists($filename)) {
            include_once $filename;
        }
    });
};
