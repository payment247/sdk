<?php

namespace Payment247\SDK\Tests\Requests;

use Payment247\SDK\Requests\PayoutApproveRequest;

class PayoutApproveRequestTest extends \PHPUnit_Framework_TestCase
{
    public function test_getRequestType()
    {
        $this->assertEquals('payout/approve', (new PayoutApproveRequest())->getRequestType());
    }

    public function test_getOrderId_setOrderId()
    {
        $request = new PayoutApproveRequest();

        $request->setOrderId('foo');

        $this->assertEquals('foo', $request->getOrderId());
        $this->assertContains('foo', $request->toArray());
    }
}
