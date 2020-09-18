<?php

namespace freteclick\SDK\Client;
use freteclick\SDK\Service\freteclick;
use freteclick\SDK\Models\quote_request;

class cotafacil{

	private $api_key = NULL;
	private $api = NULL;	

	private function __construct(){}

	protected function getInstance($api_key){
		$this->api_key = $api_key;
		$this->api = freteclick::getInstance($api_key);
		return $this;
	}	

	public function quote($quote_request){
		return $this->api->quote($quote_request);
	}	
}