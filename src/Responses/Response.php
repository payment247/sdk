<?php

namespace Payment247\SDK\Responses;

use Payment247\SDK\Exceptions\FieldNotFoundException;

abstract class Response
{
    /** @var array */
    protected $raw;

    public function __construct(array $parameters)
    {
        $this->raw = $parameters;
    }

    /**
     * @param $name
     *
     * @throws \Payment247\SDK\Exceptions\FieldNotFoundException
     *
     * @return mixed
     */
    public function getAttribute($name)
    {
        if (!isset($this->raw[$name])) {
            throw new FieldNotFoundException($name);
        }

        return $this->raw[$name];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->raw;
    }
}
