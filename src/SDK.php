<?php
namespace SDK;
use SDK\Client\CotaFacil;
use SDK\Client\Gestor;

class SDK{

	private $api_key = NULL;	

	public function __construct($api_key,$client){
		$this->api_key = $api_key;
		$this->client = $client;
		return $this;
	}

	public function cotaFacilClient(){
		return CotaFacil::getInstance($this->api_key,$this->client);
	}

	public function gestorClient(){
		return Gestor::getInstance($this->api_key,$this->client);
	}


	
}