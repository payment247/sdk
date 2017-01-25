<?php

namespace Payment247\SDK\Tests\Responses;

use Payment247\SDK\Responses\Error;

class ErrorTest extends \PHPUnit_Framework_TestCase
{
    public function test_construct_Ok()
    {
        $error = new Error(['code' => 10000, 'message' => 'ok']);

        $this->assertEquals(10000, $error->getCode());
        $this->assertEquals('ok', $error->getMessage());
    }
}
