<?php

namespace Payment247\SDK\Responses;

use Payment247\SDK\Exceptions\InvalidResponseTypeException;

class ResponseFactory
{
    /**
     * @param array $response
     *
     * @throws InvalidResponseTypeException
     *
     * @return Response
     */
    public function factory(array $response)
    {
        if (empty($response['object'])) {
            return new ArrayResponse($response);
        }

        $className = self::getClassName($response['object']);

        if (class_exists($className)) {
            return new $className($response);
        }

        throw new InvalidResponseTypeException($response['object']);
    }

    /**
     * @param $type
     *
     * @return string
     */
    protected function getClassName($type)
    {
        return __NAMESPACE__.'\\'.str_replace('_', '', ucwords($type, '_'));
    }
}
