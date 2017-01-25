<?php
/**
 * Created by PhpStorm.
 * User: iwex
 * Date: 1/25/17
 * Time: 4:35 PM.
 */

namespace Payment247\SDK\Tests\Requests\External;

use Payment247\SDK\Requests\External\LimitsRequest;

class LimitsRequestTest extends \PHPUnit_Framework_TestCase
{
    public function test_getRequestType()
    {
        $this->assertEquals('external/ps-limits', (new LimitsRequest())->getRequestType());
    }

    public function test_getPaymentSystem_setPaymentSystem()
    {
        $request = new LimitsRequest();

        $request->setPaymentSystem('foo');

        $this->assertEquals('foo', $request->getPaymentSystem());
        $this->assertContains('foo', $request->toArray());
    }

    public function test_construct()
    {
        $request = new LimitsRequest('foo');

        $this->assertEquals('foo', $request->getPaymentSystem());
        $this->assertContains('foo', $request->toArray());

        $request = new LimitsRequest('foo', 'bar');

        $this->assertEquals('foo', $request->getPaymentSystem());
        $this->assertEquals('bar', $request->getType());
        $this->assertContains('foo', $request->toArray());
    }
}
