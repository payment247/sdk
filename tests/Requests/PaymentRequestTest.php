<?php

namespace Payment247\SDK\Tests\Requests;

use Payment247\SDK\Requests\PaymentRequest;

class PaymentRequestTest extends \PHPUnit_Framework_TestCase
{
    public function test_getRequestType()
    {
        $this->assertEquals('payment', (new PaymentRequest())->getRequestType());
    }

    public function test_getProduct_setProduct()
    {
        $request = new PaymentRequest();

        $request->setProduct('foo');

        $this->assertEquals('foo', $request->getProduct());
        $this->assertContains('foo', $request->toArray());
    }
}
