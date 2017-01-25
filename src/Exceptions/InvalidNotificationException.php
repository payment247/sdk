<?php

namespace Payment247\SDK\Exceptions;

class InvalidNotificationException extends \Exception
{
    public function __construct($data)
    {
        parent::__construct('Incorrect notification: '.json_encode($data));
    }
}
