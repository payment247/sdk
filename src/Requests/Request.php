<?php

namespace Payment247\SDK\Requests;

use Payment247\SDK\Exceptions\FieldNotFoundException;

abstract class Request implements IRequest
{
    /** @var array */
    protected $raw = [];

    protected $fields = [];

    public function __construct()
    {
        foreach ($this->fields as $field) {
            $this->raw[$field] = null;
        }
    }

    /**
     * @param array $data
     *
     * @return static
     */
    public static function fromArray(array $data)
    {
        $request = new static();

        $request->setRaw($data);

        return $request;
    }

    /**
     * @param array $data
     */
    public function setRaw(array $data)
    {
        $this->raw = array_merge($this->raw, $data);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->raw;
    }

    /**
     * @return string
     */
    abstract public function getRequestType();

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
}
