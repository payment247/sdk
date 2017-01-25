<?php

namespace Payment247\SDK\Requests;

class PayoutDeclineRequest extends Request
{
    protected $fields = [
        'order_id',
    ];

    /**
     * @return string
     */
    public function getRequestType()
    {
        return 'payout/decline';
    }

    /**
     * @param $orderId
     */
    public function setOrderId($orderId)
    {
        $this->raw['order_id'] = $orderId;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->raw['order_id'];
    }
}
