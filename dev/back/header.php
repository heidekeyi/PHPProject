<?php


namespace Header;

class Header
{
    public function __invoke(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
    }
}

return new Header();