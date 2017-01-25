<?php

namespace Payment247\SDK\Requests\External;

trait TypeTrait
{
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
    public function setPayment()
    {
        $this->setType(IHasType::TYPE_PAYMENT);
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->raw['type'] = $type;
    }

    /**
     * @return void
     */
    public function setPayout()
    {
        $this->setType(IHasType::TYPE_PAYOUT);
    }
}
