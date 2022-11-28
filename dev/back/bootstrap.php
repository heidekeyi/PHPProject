<?php

namespace bootstrap;

use Router\Router;

return function (): void {
    (new Router())->execute();
};