<?php

namespace Payment247\SDK\Exceptions;

class WrongSignatureException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Incoming request has wrong signature');
    }
}
