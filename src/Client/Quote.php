<?php

namespace SDK\Client;

use SDK\Core\Client\API;
use SDK\Exception\FCClientException;
use GuzzleHttp\Exception\ClientException;

class Quote
{
  /**
   * API Service
   *
   * @var API
   */
  private $api;

  public function __construct(API $api)
  {
    $this->api = $api;
  }

  public function simulate(object $data)
  {
    try {

      return $this->api->private('POST', '/quotes', $data);
      
    } catch (\Exception $e) {

      if ($e instanceof FCClientException)
        throw new \Exception($e->getMessage());

      throw new \Exception($e);
      return $e;
    }
  }
}
