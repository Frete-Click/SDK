<?php
namespace SDK\Service;

use guzzlehttp\guzzle AS API;
use SDK\Models\origin;
use SDK\Models\destination;
use SDK\Models\order;
use SDK\Models\quote;

class freteclick{
	private $api_key = NULL;	
	
	private function __construct(){}

	protected static function getInstance($api_key){
		$this->api_key = $api_key;
		return $this;
	}

	public function quote(origin $origin,destination $destination){

		$api = new API();
		/*
		* Implementar a consulta
		*/		

	}

}