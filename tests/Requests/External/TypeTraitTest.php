<?php

namespace Payment247\SDK\Tests\Requests\External;

use Payment247\SDK\Requests\External\IHasType;
use Payment247\SDK\Requests\External\TypeTrait;

class TypeTraitTest extends \PHPUnit_Framework_TestCase
{
    public function test_setPayment()
    {
        $trait = $this->getMockBuilder(TypeTrait::class)
            ->getMockForTrait();

        $trait->setPayment();

        $this->assertEquals(IHasType::TYPE_PAYMENT, $trait->getType());
    }

    public function test_setPayout()
    {
        $trait = $this->getMockBuilder(TypeTrait::class)
            ->getMockForTrait();

        $trait->setPayout();

        $this->assertEquals(IHasType::TYPE_PAYOUT, $trait->getType());
    }
}
