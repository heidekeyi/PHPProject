<?php

namespace daily\bootstrap;

use daily\Router\Router;

return function (): void {
    (new Router((include __DIR__ . '/config.php')()))->route();
};