<?php

namespace Payment247\SDK\Responses;

class PayoutProcess extends Response
{
    /** @var bool */
    protected $success;

    public function __construct(array $parameters)
    {
        parent::__construct($parameters);

        $this->setupSuccess();
    }

    /**
     * @return void
     */
    protected function setupSuccess()
    {
        $this->success = (bool) $this->raw['success'];
    }

    /**
     * @return bool
     */
    public function getSuccess()
    {
        return $this->success;
    }
}
