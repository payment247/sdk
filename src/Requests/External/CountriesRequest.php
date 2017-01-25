<?php

namespace Payment247\SDK\Requests\External;

use Payment247\SDK\Requests\Request;

class CountriesRequest extends Request implements IHasType
{
    use TypeTrait;

    protected $fields = [
        'ps',
        'type',
    ];

    public function __construct($paymentSystem = null, $type = null)
    {
        parent::__construct();

        $this->setPaymentSystem($paymentSystem);
        $this->setType($type);
    }

    /**
     * @param string $paymentSystem
     */
    public function setPaymentSystem($paymentSystem)
    {
        $this->raw['ps'] = $paymentSystem;
    }

    /**
     * @return string
     */
    public function getRequestType()
    {
        return 'external/ps-countries';
    }

    /**
     * @return string
     */
    public function getPaymentSystem()
    {
        return $this->raw['ps'];
    }
}
