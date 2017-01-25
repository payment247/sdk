<?php

namespace Payment247\SDK\Requests\External;

use Payment247\SDK\Requests\Request;

class PaymentSystemsRequest extends Request implements IHasType
{
    use TypeTrait;

    protected $fields = [
        'type',
    ];

    public function __construct($type = null)
    {
        parent::__construct();

        $this->setType($type);
    }

    /**
     * @return string
     */
    public function getRequestType()
    {
        return 'external/ps';
    }
}
