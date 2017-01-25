<?php

namespace Payment247\SDK\Tests\Requests\External;

use Payment247\SDK\Requests\External\RatesRequest;

class RatesRequestTest extends \PHPUnit_Framework_TestCase
{
    public function test_getRequestType()
    {
        $this->assertEquals('external/rates', (new RatesRequest())->getRequestType());
    }

    public function test_getType_setType()
    {
        $request = new RatesRequest();

        $request->setType('foo');

        $this->assertEquals('foo', $request->getType());
        $this->assertContains('foo', $request->toArray());
    }

    public function test_getBuy_setSell()
    {
        $request = new RatesRequest();

        $request->setBuy();
        $this->assertEquals(RatesRequest::TYPE_BUY, $request->getType());

        $request->setSell();
        $this->assertEquals(RatesRequest::TYPE_SELL, $request->getType());
    }

    public function test_getCurrency_setCurrency()
    {
        $request = new RatesRequest();

        $request->setCurrency('USD');

        $this->assertEquals('USD', $request->getCurrency());
        $this->assertContains('USD', $request->toArray());
    }

    public function test_construct()
    {
        $request = new RatesRequest(RatesRequest::TYPE_BUY);

        $this->assertEquals(RatesRequest::TYPE_BUY, $request->getType());
        $this->assertContains(RatesRequest::TYPE_BUY, $request->toArray());

        $request = new RatesRequest(RatesRequest::TYPE_SELL, 'USD');

        $this->assertEquals(RatesRequest::TYPE_SELL, $request->getType());
        $this->assertEquals('USD', $request->getCurrency());
        $this->assertContains(RatesRequest::TYPE_SELL, $request->toArray());
        $this->assertContains('USD', $request->toArray());
    }
}
