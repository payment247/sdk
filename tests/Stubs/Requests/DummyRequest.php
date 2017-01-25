<?php

namespace Payment247\SDK\Notifications;

use Payment247\SDK\Requests\IRequest;

class DummyRequest implements IRequest
{
    /**
     * @return string
     */
    public function getRequestType()
    {
        return 'dummy_type';
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'foo' => 'bar',
        ];
    }
}
