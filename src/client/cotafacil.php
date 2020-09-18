<?php

namespace SDK\Client;
use SDK\Service\freteclick;
use SDK\Models\origin;
use SDK\Models\destination;
use SDK\Models\order;
use SDK\Models\quote;

class cotafacil{

	private $api_key = NULL;
	private $api = NULL;	

	private function __construct(){}

	protected function getInstance($api_key){
		$this->api_key = $api_key;
		$this->api = freteclick::getInstance($api_key);
		return $this;
	}	

	public function quote(origin $origin,destination $destination){
		return $this->api->quote($origin,$destination);
	}	
}