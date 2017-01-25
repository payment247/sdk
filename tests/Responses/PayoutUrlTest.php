<?php

namespace Payment247\SDK\Tests\Responses;

use Payment247\SDK\Responses\PayoutUrl;

class PayoutUrlTest extends \PHPUnit_Framework_TestCase
{
    public function test_setupUrl()
    {
        $response = new PayoutUrl(['url' => 'url123']);

        $this->assertEquals('url123', $response->getUrl());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Notice
     */
    public function test_setupUrl_notOk()
    {
        new PayoutUrl(['foo' => 'bar']);
    }
}
