<?php

namespace Payment247\SDK\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Payment247\SDK\ApiClient;
use Payment247\SDK\Requests\IRequest;
use Payment247\SDK\Responses\DummyResponse;
use Payment247\SDK\Responses\Response;
use Payment247\SDK\Responses\ResponseFactory;
use Payment247\SDK\Signer;
use Psr\Http\Message\ResponseInterface;
use ReflectionClass;
use function GuzzleHttp\json_decode;

class ApiClientTest extends \PHPUnit_Framework_TestCase
{
    public function test_setUrl()
    {
        $client = new ApiClient('foo', 'bar');

        $url = 'http://example.com';

        $client->setUrl($url);

        $reflector = new ReflectionClass(ApiClient::class);
        $property = $reflector->getProperty('url');
        $property->setAccessible(true);

        $modifiedUrl = $property->getValue($client);

        $this->assertNotEquals($url, $modifiedUrl);
        $this->assertEquals($url.'/', $modifiedUrl);

        $url = 'http://example.com/';

        $client->setUrl($url);

        $modifiedUrl = $property->getValue($client);

        $this->assertEquals($url, $modifiedUrl);
    }

    /**
     * @expectedException \GuzzleHttp\Exception\BadResponseException
     */
    public function test_send_invalidException()
    {
        $request = $this->createMock(IRequest::class);

        $request->expects($this->any())
            ->method('toArray')
            ->willReturn(['foo' => 'bar']);

        $request->expects($this->any())
            ->method('getRequestType')
            ->willReturn('test');

        $client = $this->getMockBuilder(ApiClient::class)
            ->disableOriginalConstructor()
            ->setMethods(['signRequest', 'queryRequest'])
            ->getMock();

        $client->expects($this->any())
            ->method('signRequest')
            ->willReturn(true);

        $exception = $this->createMock(BadResponseException::class);
        $exception->expects($this->any())
            ->method('hasResponse')
            ->willReturn(false);

        $client->expects($this->any())
            ->method('queryRequest')
            ->willThrowException($exception);

        $client->send($request);
    }

    public function test_send_errorException()
    {
        $request = $this->createMock(IRequest::class);

        $request->expects($this->any())
            ->method('toArray')
            ->willReturn(['foo' => 'bar']);

        $request->expects($this->any())
            ->method('getRequestType')
            ->willReturn('test');

        $client = $this->getMockBuilder(ApiClient::class)
            ->disableOriginalConstructor()
            ->setMethods(['queryRequest', 'factoryResponse'])
            ->getMock();

        $signer = $this->createMock(Signer::class);
        $signer->expects($this->any())
            ->method('sign')
            ->willReturn(['foo' => 'bar']);

        $reflector = new ReflectionClass($client);
        $property = $reflector->getProperty('signer');
        $property->setAccessible(true);
        $property->setValue($client, $signer);

        $client->expects($this->any())
            ->method('factoryResponse')
            ->with(json_decode($this->getCorrectResponse(), true))
            ->willReturn(new DummyResponse([]));

        $exception = $this->createMock(BadResponseException::class);
        $exception->expects($this->any())
            ->method('hasResponse')
            ->willReturn(true);

        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->any())
            ->method('getBody')
            ->willReturn($this->getCorrectResponse());

        $exception->expects($this->any())
            ->method('getResponse')
            ->willReturn($response);

        $client->expects($this->any())
            ->method('queryRequest')
            ->willThrowException($exception);

        $response = $client->send($request);

        $this->assertInstanceOf(Response::class, $response);
    }

    protected function getCorrectResponse()
    {
        return json_encode([
            'object' => 'dummy',
        ]);
    }

    public function test_send_correct()
    {
        $request = $this->createMock(IRequest::class);

        $request->expects($this->any())
            ->method('toArray')
            ->willReturn(['foo' => 'bar']);

        $request->expects($this->any())
            ->method('getRequestType')
            ->willReturn('test');

        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->any())
            ->method('getBody')
            ->willReturn($this->getCorrectResponse());

        $httpClient = $this->getMockBuilder(Client::class)
            ->setMethods(['post'])
            ->disableProxyingToOriginalMethods()->getMock();

        $httpClient->expects($this->any())
            ->method('post')
            ->willReturn($response);

        $client = $this->getMockBuilder(ApiClient::class)
            ->disableOriginalConstructor()
            ->setMethods(['getHttpClient'])
            ->getMock();

        $client->expects($this->any())
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $signer = $this->createMock(Signer::class);
        $signer->expects($this->any())
            ->method('sign')
            ->willReturn(['foo' => 'bar']);

        $reflector = new ReflectionClass($client);
        $propertySigner = $reflector->getProperty('signer');
        $propertySigner->setAccessible(true);
        $propertySigner->setValue($client, $signer);

        $factory = $this->createMock(ResponseFactory::class);
        $factory->expects($this->any())
            ->method('factory')
            ->willReturn(new DummyResponse([]));

        $propertyFactory = $reflector->getProperty('responseFactory');
        $propertyFactory->setAccessible(true);
        $propertyFactory->setValue($client, $factory);

        $response = $client->send($request);

        $this->assertInstanceOf(Response::class, $response);
    }

    public function test_getHttpClient()
    {
        $reflector = new ReflectionClass(ApiClient::class);

        $method = $reflector->getMethod('getHttpClient');
        $method->setAccessible(true);

        $client = $this->createMock(ApiClient::class);

        $this->assertInstanceOf(Client::class, $method->invoke($client));
    }
}
