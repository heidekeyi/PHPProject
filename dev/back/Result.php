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

    public function message(string $message): Result
    {
        $this->message = $message;
        return $this;
    }

    public function data(mixed $data): Result
    {
        $this->data = $data;
        return $this;
    }

    public function status(bool $status): Result
    {
        $this->status = $status;
        return $this;
    }

    public mixed $data;
    public string $message;
    public bool $status;
}