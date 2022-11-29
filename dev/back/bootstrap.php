<?php

namespace Bootstrap;

use Router\Router;

class Bootstrap
{
    public function __invoke(): void
    {
        (new Router())->execute();
    }
}

return new Bootstrap();