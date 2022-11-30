<?php

namespace ResultClass;

class ResultClass
{
    public function __construct(array|string $data, string $message = '', bool $status = true)
    {
        $this->mData = $data;
        $this->mMessage = $message;
        $this->mStatus = $status;
    }

    public function error(string $message): ResultClass
    {
        return $this->setMessage($message)->setStatus(false);
    }

    public function getMessage(): string
    {
        return $this->mMessage;
    }

    public function setMessage(string $message): ResultClass
    {
        $this->mMessage = $message;
        return $this;
    }

    public function getData(): array|string
    {
        return $this->mData;
    }

    public function setData(array|string $data): ResultClass
    {
        $this->mData = $data;
        return $this;
    }

    public function getStatus(): bool
    {
        return $this->mStatus;
    }

    public function setStatus(bool $status): ResultClass
    {
        $this->mStatus = $status;
        return $this;
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }

    public function serialize(): array
    {
        return [
            'status' => $this->getStatus(),
            'data' => $this->getData(),
            'message' => $this->getMessage()
        ];
    }

    private array|string $mData;
    private string $mMessage;
    private bool $mStatus;
}