<?php

namespace Payment247\SDK\Responses;

class ArrayResponse extends Response
{
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }
}
