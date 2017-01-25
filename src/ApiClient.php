<?php

namespace Payment247\SDK;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\BadResponseException;
use Payment247\SDK\Requests\IRequest;
use Payment247\SDK\Responses\ResponseFactory;

class ApiClient
{
    const VERSION = '1.0.14';

    /** @var string */
    protected $publicKey;
    /** @var string */
    protected $privateKey;

    /** @var array */
    protected $requestArray;

    /** @var string */
    protected $requestType;

    /** @var string */
    protected $url = 'https://apipayment.com/api/v1/';

    /** @var \Payment247\SDK\Signer */
    protected $signer;

    /** @var \Payment247\SDK\Responses\ResponseFactory */
    protected $responseFactory;

    /**
     * Client constructor.
     *
     * @param $publicKey
     * @param $privateKey
     */
    public function __construct($publicKey, $privateKey)
    {
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
        $this->signer = new Signer($publicKey, $privateKey);
        $this->responseFactory = new ResponseFactory();
    }

    /**
     * @param IRequest $request
     *
     * @throws \GuzzleHttp\Exception\BadResponseException
     *
     * @return \Payment247\SDK\Responses\Response
     */
    public function send(IRequest $request)
    {
        $this->requestType = $request->getRequestType();
        $this->requestArray = $request->toArray();

        $this->signRequest();

        try {
            $response = $this->queryRequest();
        } catch (BadResponseException $exception) {
            if ($exception->hasResponse()) {
                $response = $exception->getResponse();
            } else {
                throw $exception;
            }
        }

        $decodedResponse = \GuzzleHttp\json_decode($response->getBody(), true);

        return $this->factoryResponse($decodedResponse);
    }

    protected function signRequest()
    {
        $this->requestArray = $this->signer->sign($this->requestArray);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function queryRequest()
    {
        $response = $this->getHttpClient()->post($this->requestType, [
            'json' => $this->requestArray,
        ]);

        return $response;
    }

    /**
     * @return \GuzzleHttp\Client
     */
    protected function getHttpClient()
    {
        return new HttpClient(['base_uri' => $this->url]);
    }

    /**
     * @param array $decodedResponse
     *
     * @return \Payment247\SDK\Responses\Response
     */
    protected function factoryResponse(array $decodedResponse)
    {
        return $this->responseFactory->factory($decodedResponse);
    }

    /**
     * @param $url
     */
    public function setUrl($url)
    {
        $this->url = rtrim($url, '/').'/';
    }
}
