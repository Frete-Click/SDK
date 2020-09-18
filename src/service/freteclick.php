<?php
namespace freteclick\SDK\Service;

use freteclick\SDK\Models\quote_request;

class freteclick{

	private $url = 'https://api.freteclick.com.br/';
	private $api_key = NULL;	
	private $api = NULL;	
	
	private function __construct(){}

	protected static function getInstance($api_key){
		$this->api_key = $api_key;
		$this->api = new \GuzzleHttp\Client(
			[				
				'headers' => [ 
					'Accept' => 'application/json',
            		'content-type' => 'application/ld+json',
					'api-token' => $this->api_key
				]
			]);
		return $this;
	}

	public function quote($quote_request){		
		$request = $this->api->get(
			$this->url.'quote',json_encode($quote_request)
		);
		$response = $request->send();
		return $response->getBody();
	}

}