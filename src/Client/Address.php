<?php

namespace SDK\Client;

use SDK\Service\API;

class Address
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

  public function getAddressByCEP(string $cep): ?object
  {
    try {

      $response = $this->api->private('GET', sprintf('/cep_address/%s', $cep));

      if ($response->getStatusCode() === 200) {
        $result = json_decode($response->getBody());

        if (isset($result->id))
          return $result;
        return null;
      }

      return null;

    } catch (\Exception $e) {
      die($e->getMessage());
      return null;
    }
  }
}
