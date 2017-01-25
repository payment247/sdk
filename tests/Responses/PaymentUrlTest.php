<?php

namespace Payment247\SDK\Tests\Responses;

use Payment247\SDK\Responses\PaymentUrl;

class PaymentUrlTest extends \PHPUnit_Framework_TestCase
{
    public function test_setupUrl()
    {
        $response = new PaymentUrl(['url' => 'url123']);

        $this->assertEquals('url123', $response->getUrl());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Notice
     */
    public function test_setupUrl_notOk()
    {
        new PaymentUrl(['foo' => 'bar']);
    }
}
