<?php

namespace Payment247\SDK\Tests\Requests\External;

use Payment247\SDK\Requests\External\CountriesRequest;

class CountriesRequestTest extends \PHPUnit_Framework_TestCase
{
    public function test_getRequestType()
    {
        $this->assertEquals('external/ps-countries', (new CountriesRequest())->getRequestType());
    }

    public function test_getPaymentSystem_setPaymentSystem()
    {
        $request = new CountriesRequest();

        $request->setPaymentSystem('foo');

        $this->assertEquals('foo', $request->getPaymentSystem());
        $this->assertContains('foo', $request->toArray());
    }

    public function test_construct()
    {
        $request = new CountriesRequest('foo');

        $this->assertEquals('foo', $request->getPaymentSystem());
        $this->assertContains('foo', $request->toArray());

        $request = new CountriesRequest('foo', 'bar');

        $this->assertEquals('foo', $request->getPaymentSystem());
        $this->assertEquals('bar', $request->getType());
        $this->assertContains('foo', $request->toArray());
    }
}
