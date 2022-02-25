<?php

namespace SDK\Core\Client;

use GuzzleHttp\Client as GuzzClient;

class API
{
	private $endpoint = 'https://api.freteclick.com.br';
	private $apiKey   = null;
	private $client   = null;
	private $guzzle_client = null;

	public function __construct(string $apiKey, string $client)
	{
		$this->apiKey = $apiKey;
		$this->client = $client;

		$this->guzzle_client  = new GuzzClient(

			[
				'headers' => [
					'Accept' => 'application/json',
					'content-type' => 'application/ld+json',
					'api-token' => $this->apiKey,
					'client' => $this->client
				]
			]

		);
		return __CLASS__;
	}

	public function private(string $method, string $resource, $options = [])
	{
		if (empty($this->apiKey))
			throw new \Exception('API key can not be empty');
		return  $this->getRequest($method,  $resource, $options);
	}

	public function public(string $method, string $resource, $options = [])
	{
		return  $this->getRequest($method,  $resource, $options);
	}




	public function getRequest(string $method, string $resource, $options = [])
	{
		if (empty($this->client))
			throw new \Exception('API client can not be empty');

		$params = array_combine(str_replace('*', '', array_keys((array)$options)), (array) $options);
		$response = $this->guzzle_client->request($method, $this->endpoint . $resource, ['json'   => $params]);

		return $response;

	}
}
