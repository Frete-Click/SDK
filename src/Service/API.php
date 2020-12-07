<?php
namespace SDK\Service;

use GuzzleHttp\Client as GuzzClient;
use GuzzleHttp\Message\ResponseInterface;

class API
{

	private $endpoint = null;
	private $apiKey   = null;	

	public function __construct(string $endpoint, string $apiKey)
	{
		$this->endpoint = $endpoint;
		$this->apiKey   = $apiKey;
	}

	public function private(string $method, string $resource, $options = []): ResponseInterface
	{
		if (empty($this->apiKey))
			throw new \Exception('API key can not be empty');

		$client  = new GuzzClient();
		$request = $client->createRequest($method, $this->endpoint, $options);

		$request->setHeader('Accept'      , 'application/json');
		$request->setHeader('content-type', 'application/ld+json');
		$request->setHeader('api-token'   , $this->apiKey);

		$request->setPath($resource);

		return $client->send($request);
	}

	public function public(string $method, string $resource, $options = []): ResponseInterface
	{
		$client  = new GuzzClient();
		$request = $client->createRequest($method, $this->endpoint, $options);

		$request->setHeader('Accept'      , 'application/json');
		$request->setHeader('content-type', 'application/ld+json');

		$request->setPath($resource);

		return $client->send($request);
	}
}