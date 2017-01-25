<?php

namespace Payment247\SDK\Tests\Notifications;

use Payment247\SDK\Notifications\Notification;
use Payment247\SDK\Notifications\PaymentNotification;

class PaymentNotificationTest extends \PHPUnit_Framework_TestCase
{
    public function test_getAmount()
    {
        $notification = new PaymentNotification($this->getNotificationArray());

        $this->assertEquals($this->getNotificationArray()['product'], $notification->getProduct());
    }

    protected function getNotificationArray()
    {
        return [
            'type'    => 'payment',
            'subtype' => Notification::SUBTYPE_CONVERSION,
            'product' => 'product',
        ];
    }

    public function test_isRefund()
    {
        $changedParameters = $this->getNotificationArray();
        $changedParameters['subtype'] = PaymentNotification::SUBTYPE_REFUND;

        $notification = new PaymentNotification($changedParameters);

        $this->assertTrue($notification->isRefund());

        $changedParameters['subtype'] = 'another';

        $notification = new PaymentNotification($changedParameters);

        $this->assertFalse($notification->isRefund());
    }

    public function test_isChargeback()
    {
        $changedParameters = $this->getNotificationArray();
        $changedParameters['subtype'] = PaymentNotification::SUBTYPE_CHARGEBACK;

        $notification = new PaymentNotification($changedParameters);

        $this->assertTrue($notification->isChargeback());

        $changedParameters['subtype'] = 'another';

        $notification = new PaymentNotification($changedParameters);

        $this->assertFalse($notification->isChargeback());
    }
}
