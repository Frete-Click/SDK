<?php
namespace SDK;
use SDK\Client\cotafacil;
use SDK\Client\gestor;

class SDK{

	private $api_key = NULL;	

	public function __construct($api_key){
		$this->api_key = $api_key;
		return $this;
	}

	public function cotaFacilClient(){
		return cotafacil::getInstance($this->api_key);
	}

	public function gestorClient(){
		return gestor::getInstance($this->api_key);
	}


	
}