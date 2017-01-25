<?php

namespace Payment247\SDK\Responses;

class PaymentUrl extends Response implements IHasUrl
{
    use UrlResponseTrait;

    public function __construct(array $parameters)
    {
        parent::__construct($parameters);

        $this->setupUrl();
    }
}
