<?php

namespace Payment247\SDK\Tests\Responses;

use Payment247\SDK\Responses\PayoutProcess;

class PayoutProcessTest extends \PHPUnit_Framework_TestCase
{
    public function test_setupStatus()
    {
        $response = new PayoutProcess(['success' => 1]);

        $this->assertTrue($response->getSuccess());

        $response = new PayoutProcess(['success' => 0]);

        $this->assertFalse($response->getSuccess());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Notice
     */
    public function test_setupUrl_notOk()
    {
        new PayoutProcess(['foo' => 'bar']);
    }
}
