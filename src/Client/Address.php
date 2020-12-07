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
     
      $response = $this->api->public('GET', '/geo_places', ['query' => ['input' => $cep]]);

      if ($response->getStatusCode() === 200) {
        $result = json_decode($response->getBody());

        if ($result->response->success === true) {
          if (empty($result->response->data) === false)
            return $result->response->data[0];
          return null;
        }
      }

      return null;

    } catch (\Exception $e) {
      die($e->getMessage());
      return null;
    }
  }
}
