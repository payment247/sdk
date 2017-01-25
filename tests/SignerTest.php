<?php

namespace Payment247\SDK\Tests;

use Payment247\SDK\Signer;

class SignerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Payment247\SDK\Signer
     */
    protected $signer;

    public function test_checkSignature()
    {
        $signedArray = $this->getArrayToSign();
        $signedArray = array_merge($signedArray, ['public_key' => 'foo']);

        $signature = '94d73a4e5131ff1dbef5af1d8bb4fc653e35715655cd0fb102f694297d1d4a97';

        $signedArray = array_merge($signedArray, ['sign' => $signature]);

        $this->assertTrue($this->signer->checkSignature($signedArray));
    }

    public function test_sign()
    {
        $signedArray = $this->getArrayToSign();
        $signedArray = array_merge($signedArray, ['public_key' => 'foo']);

        $signature = '94d73a4e5131ff1dbef5af1d8bb4fc653e35715655cd0fb102f694297d1d4a97';

        $signedArray = array_merge($signedArray, ['sign' => $signature]);

        $this->assertEquals($signedArray, $this->signer->sign($this->getArrayToSign()));
    }

    protected function getArrayToSign()
    {
        return [
            'acme' => 'company',
        ];
    }

    protected function setUp()
    {
        parent::setUp();

        $this->signer = new Signer('foo', 'bar');
    }
}
