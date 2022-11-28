<?php

namespace validator\TypeValidator;

use Result\Result;
use validator\IValidator\IValidator;

class TypeValidator implements IValidator
{
    public function __construct(string $uri)
    {
        $this->isRest = preg_match('/\d+$/', $uri);
        $this->type = strtolower($_SERVER['REQUEST_METHOD']);
        $this->result = new Result('');

    }

    public function validate(): Result
    {
        return $this->insert()
            ->select()
            ->update()
            ->delete()
            ->preRequest()
            ->result;
    }

    private function insert(): TypeValidator
    {
        if ($this->result->status && $this->type === 'post') {
            if ($this->isRest) {
                $this->result->error('request type error on post');
            } else {
                $this->result->data(__FUNCTION__);
            }
        }
        return $this;
    }

    private function select(): TypeValidator
    {
        if ($this->result->status && $this->type === 'get') {
            if ($this->isRest) {
                $this->result->data('fetchOne');
            } else {
                $this->result->data('fetchMany');
            }
        }
        return $this;
    }

    private function update(): TypeValidator
    {
        if ($this->result->status && $this->type === 'put') {
            if ($this->isRest) {
                $this->result->data(__FUNCTION__);
            } else {
                $this->result->error('request type error on put');
            }
        }
        return $this;
    }

    private function delete(): TypeValidator
    {
        if ($this->result->status && $this->type === 'delete') {
            if ($this->isRest) {
                $this->result->data(__FUNCTION__);
            } else {
                $this->result->error('request type error on delete');
            }
        }
        return $this;
    }

    private function preRequest(): TypeValidator
    {
        if ($this->type === 'options') {
            $this->result->message('pass')->data('');
        }
        return $this;
    }

    private Result $result;
    readonly private bool $isRest;
    readonly private string $type;
}