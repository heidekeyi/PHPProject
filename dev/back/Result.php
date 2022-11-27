<?php

namespace daily\Result;

class Result
{
    public function __construct(mixed $data, string $message = '', bool $status = true)
    {
        $this->data = $data;
        $this->message = $message;
        $this->status = $status;
    }

    public mixed $data;
    public string $message;
    public bool $status;
}