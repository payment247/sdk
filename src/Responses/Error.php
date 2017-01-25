<?php

namespace Payment247\SDK\Responses;

class Error extends Response
{
    /** @var int */
    protected $code;
    /** @var string */
    protected $message;

    public function __construct(array $parameters)
    {
        parent::__construct($parameters);

        $this->setupCode();
        $this->setupMessage();
    }

    /**
     * @return void
     */
    protected function setupCode()
    {
        $this->code = $this->raw['code'];
    }

    /**
     * @return void
     */
    protected function setupMessage()
    {
        $this->message = $this->raw['message'];
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
