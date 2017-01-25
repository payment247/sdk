<?php

namespace Payment247\SDK\Tests\Responses;

use Payment247\SDK\Responses\Payout;

class PayoutTest extends \PHPUnit_Framework_TestCase
{
    public function test_setupStatus()
    {
        $response = new Payout(['status' => 'ok']);

        $this->assertEquals('ok', $response->getStatus());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Notice
     */
    public function test_setupUrl_notOk()
    {
        new Payout(['foo' => 'bar']);
    }
}
