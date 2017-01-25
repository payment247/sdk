<?php

namespace Payment247\SDK\Tests\Requests;

use Payment247\SDK\Requests\PayoutRequest;

class PayoutRequestTest extends \PHPUnit_Framework_TestCase
{
    public function test_getRequestType()
    {
        $this->assertEquals('payout', (new PayoutRequest())->getRequestType());
    }

    public function test_isHold_setHold()
    {
        $request = new PayoutRequest();

        $request->setHold(false);

        $this->assertFalse($request->isHold());
    }
}
