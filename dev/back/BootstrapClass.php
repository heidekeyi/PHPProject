<?php

namespace BootstrapClass;

use RouterClass\RouterClass;

class BootstrapClass
{
    public function __invoke(): void
    {
        (new RouterClass())->execute();
    }
}

return new BootstrapClass();