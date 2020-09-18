<?php

namespace SDK\Client;
use SDK\Service\freteclick;

class gestor{
	private function __construct(){

	}

	protected function getInstance($api_key){
		$this->api_key = $api_key;
		return $this;
	}	

}