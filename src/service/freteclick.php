<?php
namespace SDK\Service;

use SDK\Models\origin;
use SDK\Models\destination;
use SDK\Models\order;
use SDK\Models\quote;

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

	public function quote(origin $origin,destination $destination){		
		$request = $this->api->get(
			$this->url.'quote',
			array(
				'origin'		=> $origin,
				'destination'	=> $destination
			)
		);
		$response = $request->send();
		return $response->getBody();
	}

}