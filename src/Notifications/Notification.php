<?php

namespace Payment247\SDK\Notifications;

use Payment247\SDK\Exceptions\FieldNotFoundException;

/**
 * Class Notification.
 */
abstract class Notification
{
    const SUBTYPE_CONVERSION = 'conversion';
    const SUBTYPE_FAIL = 'fail';

    /**
     * @var array
     */
    protected $raw;

    /**
     * @var array
     */
    protected $fields = [];

    /**
     * Notification constructor.
     *
     * @param array $rawNotification
     */
    public function __construct(array $rawNotification)
    {
        $this->raw = $rawNotification;
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
    public function getType()
    {
        return $this->raw['type'];
    }

    /**
     * @return string
     */
    public function getTxnId()
    {
        return $this->raw['txn_id'];
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->raw['amount'];
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->raw['currency'];
    }

    /**
     * @return float
     */
    public function getExpectedAmountPaid()
    {
        return $this->raw['expected_amount_paid'];
    }

    /**
     * @return string
     */
    public function getExpectedAmountPaidCurrency()
    {
        return $this->raw['expected_amount_paid_currency'];
    }

    /**
     * @return float
     */
    public function getConfirmedAmount()
    {
        return $this->raw['confirmed_amount'];
    }

    /**
     * @return string
     */
    public function getConfirmedCurrency()
    {
        return $this->raw['confirmed_currency'];
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->raw['user'];
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->raw['order_id'];
    }

    /**
     * @return string
     */
    public function getPs()
    {
        return $this->raw['ps'];
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->raw['email'];
    }

    /**
     * @return array
     */
    public function getCustom()
    {
        return $this->raw['custom'];
    }

    /**
     * @return bool
     */
    public function isConversion()
    {
        return $this->getSubType() === self::SUBTYPE_CONVERSION;
    }

    /**
     * @return string
     */
    public function getSubType()
    {
        return $this->raw['subtype'];
    }

    /**
     * @return bool
     */
    public function isFail()
    {
        return $this->getSubType() === self::SUBTYPE_FAIL;
    }

    /**
     * @param string $name
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
