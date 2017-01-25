<?php

namespace Payment247\SDK\Exceptions;

class FieldNotFoundException extends \Exception
{
    public function __construct($data)
    {
        parent::__construct('Field "'.$data.'" was not found');
    }
}
