<?php

namespace Payment247\SDK;

use Payment247\SDK\Exceptions\WrongSignatureException;
use Payment247\SDK\Notifications\Notification;
use Payment247\SDK\Notifications\NotificationFactory;

class NotificationClient
{
    /** @var string */
    protected $privateKey;

    /** @var Signer */
    protected $signer;

    /** @var NotificationFactory */
    protected $notificationFactory;

    /**
     * Client constructor.
     *
     * @param $privateKey
     */
    public function __construct($privateKey)
    {
        $this->privateKey = $privateKey;
        $this->signer = new Signer(null, $privateKey);
        $this->notificationFactory = new NotificationFactory();
    }

    /**
     * @param $jsonString
     *
     * @throws Exceptions\InvalidNotificationException
     * @throws Exceptions\InvalidNotificationTypeException
     * @throws WrongSignatureException
     *
     * @return Notification
     */
    public function parse($jsonString)
    {
        $notificationArray = \GuzzleHttp\json_decode($jsonString, true);

        $notification = $this->getNotificationFactory()->factory($notificationArray);

        $this->checkSignature($notification);

        return $notification;
    }

    protected function getNotificationFactory()
    {
        return $this->notificationFactory;
    }

    /**
     * @param Notification $notification
     *
     * @throws WrongSignatureException
     */
    protected function checkSignature(Notification $notification)
    {
        if (!$this->getSigner()->checkSignature($notification->toArray())) {
            throw new WrongSignatureException();
        }
    }

    /**
     * @return \Payment247\SDK\Signer
     */
    protected function getSigner()
    {
        return $this->signer;
    }
}
