<?php

namespace Payment247\SDK\Tests\Notifications;

use Payment247\SDK\Notifications\Notification;
use Payment247\SDK\Notifications\NotificationFactory;

class NotificationFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Payment247\SDK\Exceptions\InvalidNotificationException
     */
    public function test_factory_emptyType()
    {
        $rawNotification = $this->getNotificationArray();

        $rawNotification['type'] = '';

        $factory = new NotificationFactory();
        $factory->factory($rawNotification);
    }

    protected function getNotificationArray()
    {
        return [
            'type'                          => 'dummy',
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
            'product'                       => 'product',
            'email'                         => 'email@example.com',
            'custom'                        => [
                'x' => 'y',
            ],
            'sign'                          => 'valid_signature',
        ];
    }

    /**
     * @expectedException \Payment247\SDK\Exceptions\InvalidNotificationException
     */
    public function test_factory_noType()
    {
        $rawNotification = $this->getNotificationArray();

        unset($rawNotification['type']);
        $factory = new NotificationFactory();
        $factory->factory($rawNotification);
    }

    /**
     * @expectedException \Payment247\SDK\Exceptions\InvalidNotificationTypeException
     */
    public function test_factory_wrongType()
    {
        $rawNotification = $this->getNotificationArray();

        $rawNotification['type'] = 'bar';

        $factory = new NotificationFactory();
        $factory->factory($rawNotification);
    }

    public function test_factory_Ok()
    {
        $rawNotification = $this->getNotificationArray();
        $factory = new NotificationFactory();
        $factory->factory($rawNotification);
        $this->assertInstanceOf(Notification::class, $factory->factory($rawNotification));
    }
}
