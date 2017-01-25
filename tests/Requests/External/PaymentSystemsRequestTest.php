<?php

namespace Payment247\SDK\Tests\Requests\External;

use Payment247\SDK\Requests\External\PaymentSystemsRequest;

class PaymentSystemsRequestTest extends \PHPUnit_Framework_TestCase
{
    public function test_getRequestType()
    {
        $this->assertEquals('external/ps', (new PaymentSystemsRequest())->getRequestType());
    }

    public function test_construct()
    {
        $request = new PaymentSystemsRequest('foo');

        $this->assertEquals('foo', $request->getType());
        $this->assertContains('foo', $request->toArray());
    }
}
