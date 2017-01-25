<?php

namespace Payment247\SDK\Tests;

use Payment247\SDK\NotificationClient;
use Payment247\SDK\Notifications\Notification;
use Payment247\SDK\Notifications\NotificationFactory;
use Payment247\SDK\Signer;
use ReflectionClass;

class NotificationClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_parseNotification_wrongJson()
    {
        $client = new NotificationClient('foo');

        $client->parse('{ccc');
    }

    /**
     * @expectedException \Payment247\SDK\Exceptions\WrongSignatureException
     */
    public function test_parseNotification_wrongSignature()
    {
        $signer = $this->createMock(Signer::class);

        $signer->expects($this->any())
            ->method('checkSignature')
            ->willReturn(false);

        $notificationFactory = $this->createMock(NotificationFactory::class);

        $notification = $this->createMock(Notification::class);
        $notification->expects($this->any())
            ->method('toArray')
            ->willReturn([]);

        $notificationFactory->expects($this->once())
            ->method('factory')
            ->willReturn($notification);

        $client = $this->getMockBuilder(NotificationClient::class)
            ->disableOriginalConstructor()
            ->setMethods(['getNotificationFactory', 'getSigner'])
            ->getMock();

        $client->expects($this->once())
            ->method('getNotificationFactory')
            ->willReturn($notificationFactory);

        $client->expects($this->once())
            ->method('getSigner')
            ->willReturn($signer);

        $client->parse('{}');
    }

    public function test_parseNotification_Ok()
    {
        $signer = $this->createMock(Signer::class);

        $signer->expects($this->any())
            ->method('checkSignature')
            ->willReturn(true);

        $notificationFactory = $this->createMock(NotificationFactory::class);

        $notification = $this->createMock(Notification::class);
        $notification->expects($this->any())
            ->method('toArray')
            ->willReturn([]);

        $notificationFactory->expects($this->once())
            ->method('factory')
            ->willReturn($notification);

        $client = $this->getMockBuilder(NotificationClient::class)
            ->disableOriginalConstructor()
            ->setMethods(['getNotificationFactory', 'getSigner'])
            ->getMock();

        $client->expects($this->once())
            ->method('getNotificationFactory')
            ->willReturn($notificationFactory);

        $client->expects($this->once())
            ->method('getSigner')
            ->willReturn($signer);

        $client->parse('{}');
    }

    public function test_getNotificationFactory()
    {
        $client = $this->getMockBuilder(NotificationClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $reflector = new ReflectionClass(NotificationClient::class);
        $property = $reflector->getProperty('notificationFactory');
        $property->setAccessible(true);

        $method = $reflector->getMethod('getNotificationFactory');
        $method->setAccessible(true);

        $notificationFactory = $this->createMock(NotificationFactory::class);

        $property->setValue($client, $notificationFactory);

        $this->assertEquals($notificationFactory, $method->invoke($client));
    }

    public function test_getSigner()
    {
        $client = $this->getMockBuilder(NotificationClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $reflector = new ReflectionClass(NotificationClient::class);
        $property = $reflector->getProperty('signer');
        $property->setAccessible(true);

        $method = $reflector->getMethod('getSigner');
        $method->setAccessible(true);

        $signer = $this->createMock(Signer::class);

        $property->setValue($client, $signer);

        $this->assertEquals($signer, $method->invoke($client));
    }
}
