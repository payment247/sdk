<?php

namespace Payment247\SDK\Responses;

class Payout extends Response
{
    const SUCCESS_STATUS = 'successful';
    const PROCESSING_STATUS = 'processing';
    const HOLD_STATUS = 'hold_by_merchant';
    const FAILED_STATUS = 'failed';

    /** @var string */
    protected $status;

    public function __construct(array $parameters)
    {
        parent::__construct($parameters);

        $this->setupStatus();
    }

    /**
     * @return void
     */
    protected function setupStatus()
    {
        $this->status = $this->raw['status'];
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }
}
