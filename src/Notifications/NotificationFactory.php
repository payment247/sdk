<?php

namespace Payment247\SDK\Notifications;

use Payment247\SDK\Exceptions\InvalidNotificationException;
use Payment247\SDK\Exceptions\InvalidNotificationTypeException;

class NotificationFactory
{
    /**
     * @param array $notification
     *
     * @throws InvalidNotificationException
     * @throws InvalidNotificationTypeException
     *
     * @return Notification
     */
    public function factory(array $notification)
    {
        if (empty($notification['type'])) {
            throw new InvalidNotificationException($notification);
        }

        $className = $this->getClassName($notification['type']);

        if (class_exists($className)) {
            return new $className($notification);
        }

        throw new InvalidNotificationTypeException($notification['type']);
    }

    /**
     * @param $type
     *
     * @return string
     */
    protected function getClassName($type)
    {
        return __NAMESPACE__.'\\'.str_replace('_', '', ucwords($type, '_')).'Notification';
    }
}
