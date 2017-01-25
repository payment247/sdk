<?php

namespace Payment247\SDK\Tests\Responses;

use Payment247\SDK\Responses\ArrayResponse;
use Payment247\SDK\Responses\DummyResponse;
use Payment247\SDK\Responses\ResponseFactory;

class ResponseFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function test_factory_emptyType()
    {
        $rawResponse = [];

        $factory = new ResponseFactory();
        $this->assertInstanceOf(ArrayResponse::class, $factory->factory($rawResponse));
    }

    /**
     * @expectedException \Payment247\SDK\Exceptions\InvalidResponseTypeException
     */
    public function test_factory_wrongObject()
    {
        $rawResponse = ['object' => 'bar'];

        $factory = new ResponseFactory();
        $factory->factory($rawResponse);
    }

    public function test_factory_ok()
    {
        $rawResponse = ['object' => 'dummy_response'];

        $factory = new ResponseFactory();
        $this->assertInstanceOf(DummyResponse::class, $factory->factory($rawResponse));
    }
}
