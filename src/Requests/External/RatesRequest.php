<?php

namespace Payment247\SDK\Requests\External;

use Payment247\SDK\Requests\Request;

class RatesRequest extends Request
{
    const TYPE_BUY = 'buy';
    const TYPE_SELL = 'sell';

    protected $fields = [
        'type',
        'currency',
    ];

    public function __construct($type = null, $currency = null)
    {
        parent::__construct();
        $this->setType($type);
        $this->setCurrency($currency);
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->raw['type'] = $type;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->raw['currency'] = $currency;
    }

    /**
     * @return string
     */
    public function getRequestType()
    {
        return 'external/rates';
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->raw['currency'];
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->raw['type'];
    }

    /**
     * @return void
     */
    public function setBuy()
    {
        $this->setType(self::TYPE_BUY);
    }

    /**
     * @return void
     */
    public function setSell()
    {
        $this->setType(self::TYPE_SELL);
    }
}
