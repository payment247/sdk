<?php

namespace Payment247\SDK\Requests;

interface IRequest
{
    /**
     * @return array
     */
    public function toArray();

    /**
     * @return string
     */
    public function getRequestType();
}
