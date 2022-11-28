<?php

namespace validator\TypeValidator;

use Result\Result;
use validator\IValidator\IValidator;

class TypeValidator implements IValidator
{
    public function __construct(string $uri)
    {
        $this->mIsRest = preg_match('/\d+$/', $uri);
        $this->mType = strtolower($_SERVER['REQUEST_METHOD']);
        $this->mResult = new Result('');

    }

    public function validate(): Result
    {
        return $this->insert()
            ->select()
            ->update()
            ->delete()
            ->preRequest()
            ->mResult;
    }

    private function insert(): TypeValidator
    {
        if ($this->mResult->mStatus && $this->mType === 'post') {
            if ($this->mIsRest) {
                $this->mResult->error('request type error on post');
            } else {
                $this->mResult->data(__FUNCTION__);
            }
        }
        return $this;
    }

    private function select(): TypeValidator
    {
        if ($this->mResult->mStatus && $this->mType === 'get') {
            $this->mResult->data(__FUNCTION__);
        }
        return $this;
    }

    private function update(): TypeValidator
    {
        if ($this->mResult->mStatus && $this->mType === 'put') {
            if ($this->mIsRest) {
                $this->mResult->data(__FUNCTION__);
            } else {
                $this->mResult->error('request type error on put');
            }
        }
        return $this;
    }

    private function delete(): TypeValidator
    {
        if ($this->mResult->mStatus && $this->mType === 'delete') {
            if ($this->mIsRest) {
                $this->mResult->data(__FUNCTION__);
            } else {
                $this->mResult->error('request type error on delete');
            }
        }
        return $this;
    }

    private function preRequest(): TypeValidator
    {
        if ($this->mType === 'options') {
            $this->mResult->message('pass')->data('');
        }
        return $this;
    }

    private Result $mResult;
    readonly private bool $mIsRest;
    readonly private string $mType;
}