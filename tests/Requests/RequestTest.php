<?php

namespace Payment247\SDK\Tests\Requests;

use Payment247\SDK\Requests\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function test_fromArray()
    {
        $requestClass = $this->getMockForAbstractClass(Request::class);

        $request = $requestClass::fromArray([]);

        $this->assertInstanceOf(Request::class, $request);
        $this->assertEquals($requestClass->toArray(), []);

        $request = $requestClass::fromArray(['foo' => 'bar']);
        $this->assertEquals(['foo' => 'bar'], $request->toArray());
    }

    /**
     * @expectedException \Payment247\SDK\Exceptions\FieldNotFoundException
     */
    public function test_getAttribute_noSuchAttribute()
    {
        $requestClass = $this->getMockForAbstractClass(Request::class);

        $request = $requestClass::fromArray(['foo' => 'bar']);

        $request->getAttribute('bim');
    }

    public function test_getAttribute_ok()
    {
        $requestClass = $this->getMockForAbstractClass(Request::class);

        $request = $requestClass::fromArray(['foo' => 'bar']);

        $this->assertEquals('bar', $request->getAttribute('foo'));
    }
}
