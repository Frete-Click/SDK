<?php

namespace SDK\Service;

use SDK\Core\Client\API;

class FreteClick
{
	private static $api_key = null;
	private static $client = null;

	private function __construct()
	{
	}

	public static function getInstance($api_key, $client)
	{
		self::$api_key = $api_key;
		self::$client = $client;

		return  new API(self::$api_key, self::$client);
	}
}
