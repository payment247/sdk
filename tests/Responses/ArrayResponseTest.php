<?php

namespace Payment247\SDK\Tests\Responses;

use Payment247\SDK\Responses\ArrayResponse;

class ArrayResponseTest extends \PHPUnit_Framework_TestCase
{
    public function test_toArray()
    {
        $response = new ArrayResponse(['foo']);
        $this->assertEquals(['foo'], $response->toArray());
    }
}
