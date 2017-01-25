<?php

namespace Payment247\SDK\Notifications;

class PayoutNotification extends Notification
{
    const SUBTYPE_PROCESSING = 'processing';
    const SUBTYPE_HOLD_BY_MERCHANT = 'hold_by_merchant';
    const SUBTYPE_DECLINED_BY_MERCHANT = 'declined_by_merchant';

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
        'merchant_debt_amount',
        'merchant_debt_currency',
        'user',
        'order_id',
        'ps',
        'email',
        'custom',
    ];

    /**
     * @return float
     */
    public function getMerchantDebtAmount()
    {
        return $this->raw['merchant_debt_amount'];
    }

    /**
     * @return string
     */
    public function getMerchantDebtCurrency()
    {
        return $this->raw['merchant_debt_currency'];
    }

    /**
     * @return bool
     */
    public function isProcessing()
    {
        return $this->getSubType() === self::SUBTYPE_PROCESSING;
    }

    /**
     * @return bool
     */
    public function isHoldedByMerchant()
    {
        return $this->getSubType() === self::SUBTYPE_HOLD_BY_MERCHANT;
    }

    /**
     * @return bool
     */
    public function isDeclinedByMerchant()
    {
        return $this->getSubType() === self::SUBTYPE_DECLINED_BY_MERCHANT;
    }
}
