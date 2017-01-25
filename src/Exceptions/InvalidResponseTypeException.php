<?php

namespace Payment247\SDK\Exceptions;

class InvalidResponseTypeException extends \Exception
{
    public function __construct($data)
    {
        parent::__construct(json_encode($data));
    }
}
