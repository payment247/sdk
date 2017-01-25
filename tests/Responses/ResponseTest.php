<?php

namespace Payment247\SDK\Tests\Responses;

use Payment247\SDK\Responses\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function test_toArray()
    {
        $responseClass = $this->getMockForAbstractClass(Response::class, [['foo' => 'bar']]);

        $this->assertEquals(['foo' => 'bar'], $responseClass->toArray());
    }

    /**
     * @expectedException \Payment247\SDK\Exceptions\FieldNotFoundException
     */
    public function test_getAttribute_noSuchAttribute()
    {
        $response = $this->getMockForAbstractClass(Response::class, [['foo' => 'bar']]);

        $response->getAttribute('bim');
    }

    public function test_getAttribute_ok()
    {
        $response = $this->getMockForAbstractClass(Response::class, [['foo' => 'bar']]);

        $this->assertEquals('bar', $response->getAttribute('foo'));
    }
}
