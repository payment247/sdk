<?php

namespace Payment247\SDK\Notifications;

class PaymentNotification extends Notification
{
    const SUBTYPE_CHARGEBACK = 'chargeback';
    const SUBTYPE_REFUND = 'refund';

    protected $fields = [
        'type',
        'subtype',
        'txn_id',
        'amount',
        'currency',
        'expected_amount_paid',
        'expected_amount_paid_currency',
        'confirmed_amount',
        'confirmed_currency',
        'user',
        'order_id',
        'ps',
        'product',
        'email',
        'custom',
    ];

    /**
     * @return string
     */
    public function getProduct()
    {
        return $this->raw['product'];
    }

    /**
     * @return bool
     */
    public function isRefund()
    {
        return $this->getSubType() === self::SUBTYPE_REFUND;
    }

    /**
     * @return bool
     */
    public function isChargeback()
    {
        return $this->getSubType() === self::SUBTYPE_CHARGEBACK;
    }
}
