<?php

namespace Payment247\SDK\Tests\Notifications;

use Payment247\SDK\Notifications\Notification;

class NotificationTest extends \PHPUnit_Framework_TestCase
{
    /** @var Notification */
    protected $notification;

    public function setUp()
    {
        parent::setUp();

        $this->notification = $this->getMockBuilder(Notification::class)
            ->setConstructorArgs([$this->getNotificationArray()])
            ->getMockForAbstractClass();
    }

    protected function getNotificationArray()
    {
        return [
            'type'                          => 'payment',
            'subtype'                       => Notification::SUBTYPE_CONVERSION,
            'txn_id'                        => 'xxx',
            'amount'                        => 10,
            'currency'                      => 'USD',
            'expected_amount_paid'          => 10,
            'expected_amount_paid_currency' => 'USD',
            'confirmed_amount'              => 10,
            'confirmed_currency'            => 'USD',
            'user'                          => 'userX',
            'order_id'                      => 'yyy',
            'ps'                            => 'ps',
            'email'                         => 'email@example.com',
            'custom'                        => [
                'x' => 'y',
            ],
        ];
    }

    public function test_toArray()
    {
        $this->assertEquals($this->getNotificationArray(), $this->notification->toArray());
    }

    public function test_getType()
    {
        $this->assertEquals($this->getNotificationArray()['type'], $this->notification->getType());
    }

    public function test_getTxnId()
    {
        $this->assertEquals($this->getNotificationArray()['txn_id'], $this->notification->getTxnId());
    }

    public function test_getAmount()
    {
        $this->assertEquals($this->getNotificationArray()['amount'], $this->notification->getAmount());
    }

    public function test_getCurrency()
    {
        $this->assertEquals($this->getNotificationArray()['currency'], $this->notification->getCurrency());
    }

    public function test_getExpectedAmountPaid()
    {
        $this->assertEquals($this->getNotificationArray()['expected_amount_paid'], $this->notification->getExpectedAmountPaid());
    }

    public function test_getExpectedAmountPaidCurrency()
    {
        $this->assertEquals($this->getNotificationArray()['expected_amount_paid_currency'], $this->notification->getExpectedAmountPaidCurrency());
    }

    public function test_getConfirmedAmount()
    {
        $this->assertEquals($this->getNotificationArray()['confirmed_amount'], $this->notification->getConfirmedAmount());
    }

    public function test_getConfirmedCurrency()
    {
        $this->assertEquals($this->getNotificationArray()['confirmed_currency'], $this->notification->getConfirmedCurrency());
    }

    public function test_getUser()
    {
        $this->assertEquals($this->getNotificationArray()['user'], $this->notification->getUser());
    }

    public function test_getOrderId()
    {
        $this->assertEquals($this->getNotificationArray()['order_id'], $this->notification->getOrderId());
    }

    public function test_getPs()
    {
        $this->assertEquals($this->getNotificationArray()['ps'], $this->notification->getPs());
    }

    public function test_getEmail()
    {
        $this->assertEquals($this->getNotificationArray()['email'], $this->notification->getEmail());
    }

    public function test_getCustom()
    {
        $this->assertEquals($this->getNotificationArray()['custom'], $this->notification->getCustom());
    }

    public function test_getSubType()
    {
        $this->assertEquals($this->getNotificationArray()['subtype'], $this->notification->getSubType());
    }

    /**
     * @depends test_getSubType
     */
    public function test_isConversion()
    {
        $this->assertTrue($this->notification->isConversion());

        $changedParameters = $this->getNotificationArray();
        $changedParameters['subtype'] = 'another';

        $this->notification = $this->getMockBuilder(Notification::class)
            ->setConstructorArgs([$changedParameters])
            ->getMockForAbstractClass();

        $this->assertFalse($this->notification->isConversion());
    }

    /**
     * @depends test_getSubType
     */
    public function test_isFail()
    {
        $this->assertFalse($this->notification->isFail());

        $changedParameters = $this->getNotificationArray();
        $changedParameters['subtype'] = Notification::SUBTYPE_FAIL;

        $this->notification = $this->getMockBuilder(Notification::class)
            ->setConstructorArgs([$changedParameters])
            ->getMockForAbstractClass();

        $this->assertTrue($this->notification->isFail());
    }

    public function test_getAttribute_Ok()
    {
        $this->assertEquals($this->getNotificationArray()['type'], $this->notification->getAttribute('type'));
    }

    /**
     * @expectedException \Payment247\SDK\Exceptions\FieldNotFoundException
     */
    public function test_getAttribute_WrongField()
    {
        $this->notification->getAttribute('foo');
    }
}
