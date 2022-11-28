<?php

namespace Result;

class Result
{
    public function __construct(mixed $data, string $message = '', bool $status = true)
    {
        $this->mData = $data;
        $this->mMessage = $message;
        $this->mStatus = $status;
    }

    public function error(string $message): Result
    {
        return $this->message($message)->status(false);
    }

    public function message(string $message): Result
    {
        $this->mMessage = $message;
        return $this;
    }

    public function data(mixed $data): Result
    {
        $this->mData = $data;
        return $this;
    }

    public function status(bool $status): Result
    {
        $this->mStatus = $status;
        return $this;
    }

    public mixed $mData;
    public string $mMessage;
    public bool $mStatus;
}