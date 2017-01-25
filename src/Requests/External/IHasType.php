<?php

namespace Payment247\SDK\Requests\External;

interface IHasType
{
    const TYPE_PAYMENT = 'payment';
    const TYPE_PAYOUT = 'payout';

    /**
     * @return string
     */
    public function getType();

    /**
     * @return void
     */
    public function setPayment();

    /**
     * @return void
     */
    public function setPayout();

    /**
     * @param string $type
     */
    public function setType($type);
}
