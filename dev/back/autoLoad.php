<?php

namespace daily\AutoLoad;

return function (): void {
    spl_autoload_register(function (string $cls) {
        $name = (include __DIR__ . '/config.php')()['project'] ?? '';
        if (!empty($name)) {
            $cls = preg_replace("/^$name\\\\/", '', $cls);
        }
        $cls = preg_replace("/\\\\\w+$/", '', $cls);
        $filename = __DIR__ . '/' . $cls . '.php';
        $filename = str_replace('\\', '/', $filename);
        if (file_exists($filename)) {
            include_once $filename;
        }
    });
};
