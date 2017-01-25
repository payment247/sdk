<?php

namespace Payment247\SDK\Tests\Requests;

use Payment247\SDK\Requests\PayoutDeclineRequest;

class PayoutDeclineRequestTest extends \PHPUnit_Framework_TestCase
{
    public function test_getRequestType()
    {
        $this->assertEquals('payout/decline', (new PayoutDeclineRequest())->getRequestType());
    }

    public function test_getOrderId_setOrderId()
    {
        $request = new PayoutDeclineRequest();

        $request->setOrderId('foo');

        $this->assertEquals('foo', $request->getOrderId());
        $this->assertContains('foo', $request->toArray());
    }
}
