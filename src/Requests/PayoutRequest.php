<?php

namespace Payment247\SDK\Requests;

class PayoutRequest extends Request implements IFlow
{
    use FlowTrait, TransactionTrait;

    protected $fields = [
        'amount',
        'currency',
        'order_id',
        'user',
        'hold',
        'ps',
        'flow',
        'flow_parameters',
        'success_url',
        'pending_url',
        'fail_url',
        'email',
        'custom',
    ];

    /**
     * @return string
     */
    public function getRequestType()
    {
        return 'payout';
    }

    /**
     * @return bool
     */
    public function isHold()
    {
        return (bool) $this->raw['hold'];
    }

    /**
     * @param string $hold
     */
    public function setHold($hold)
    {
        $this->raw['hold'] = (int) $hold;
    }
}
