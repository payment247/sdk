<?php

namespace Payment247\SDK\Tests\Notifications;

use Payment247\SDK\Notifications\Notification;
use Payment247\SDK\Notifications\PayoutNotification;

class PayoutNotificationTest extends \PHPUnit_Framework_TestCase
{
    public function test_getMerchantDebtAmount()
    {
        $notification = new PayoutNotification($this->getNotificationArray());

        $this->assertEquals($this->getNotificationArray()['merchant_debt_amount'], $notification->getMerchantDebtAmount());
    }

    protected function getNotificationArray()
    {
        return [
            'type'                   => 'payment',
            'subtype'                => Notification::SUBTYPE_CONVERSION,
            'merchant_debt_amount'   => 10,
            'merchant_debt_currency' => 'USD',
        ];
    }

    public function test_getMerchantDebtCurrency()
    {
        $notification = new PayoutNotification($this->getNotificationArray());

        $this->assertEquals($this->getNotificationArray()['merchant_debt_currency'], $notification->getMerchantDebtCurrency());
    }

    public function test_isProcessing()
    {
        $changedParameters = $this->getNotificationArray();
        $changedParameters['subtype'] = PayoutNotification::SUBTYPE_PROCESSING;

        $notification = new PayoutNotification($changedParameters);

        $this->assertTrue($notification->isProcessing());

        $changedParameters['subtype'] = 'another';

        $notification = new PayoutNotification($changedParameters);

        $this->assertFalse($notification->isProcessing());
    }

    public function test_isHoldedByMerchant()
    {
        $changedParameters = $this->getNotificationArray();
        $changedParameters['subtype'] = PayoutNotification::SUBTYPE_HOLD_BY_MERCHANT;

        $notification = new PayoutNotification($changedParameters);

        $this->assertTrue($notification->isHoldedByMerchant());

        $changedParameters['subtype'] = 'another';

        $notification = new PayoutNotification($changedParameters);

        $this->assertFalse($notification->isHoldedByMerchant());
    }

    public function test_isDeclinedByMerchant()
    {
        $changedParameters = $this->getNotificationArray();
        $changedParameters['subtype'] = PayoutNotification::SUBTYPE_DECLINED_BY_MERCHANT;

        $notification = new PayoutNotification($changedParameters);

        $this->assertTrue($notification->isDeclinedByMerchant());

        $changedParameters['subtype'] = 'another';

        $notification = new PayoutNotification($changedParameters);

        $this->assertFalse($notification->isDeclinedByMerchant());
    }
}
