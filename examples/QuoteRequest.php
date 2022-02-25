<?php

require_once('../vendor/autoload.php');

use SDK\Client\Quote;
use SDK\Core\Client\API;
use SDK\Models\QuoteRequest;
use SDK\Models\Package;
use SDK\Models\Origin;
use SDK\Models\Destination;
use SDK\Models\Config;
use SDK\SDK;

$quote_request = new QuoteRequest();

$config = new Config;
$config->setQuoteType('full');
$config->setOrder('total');
$quote_request->setConfig($config);

$origin = new Origin();
$origin->setCEP('07060000');
$origin->setStreet('Alameda yayá');
$origin->setNumber(424);
$origin->setComplement('');
$origin->setDistrict('Jd Aliança');
$origin->setCity('Guarulhos');
$origin->setState('SP');
$origin->setCountry('Brasil');
$quote_request->setOrigin($origin);



$destination = new Destination();
$destination->setCEP('07060000');
$destination->setStreet('Alameda yayá');
$destination->setNumber(424);
$destination->setComplement('');
$destination->setDistrict('Jd Aliança');
$destination->setCity('Guarulhos');
$destination->setState('SP');
$destination->setCountry('Brasil');
$quote_request->setDestination($destination);


/*
* Pacote 1
*/
$package = new Package();
$package->setQuantity(1);
$package->setWeight(0.2);
$package->setHeight(0.2);
$package->setWidth(0.2);
$package->setDepth(0.2);
$package->setProductType('Móveis');
$package->setProductPrice(100);
$quote_request->addPackage($package);


/*
* Pacote 2
*/
$package = new Package();
$package->setQuantity(5);
$package->setWeight(0.2);
$package->setHeight(0.2);
$package->setWidth(0.2);
$package->setDepth(0.2);
$package->setProductType('Móveis');
$package->setProductPrice(100);

/**
 * API KEY
 */
$api_key = "5285b8cb1e59e874558c69d1cbc5606e";

try {

    $SDK = new SDK($api_key, 'Woo Commerce');
    $SDK = new Quote($SDK->cotaFacilClient());
    $array_resp = $SDK->simulate($quote_request);

    //print_r($array_resp);

} catch (\Exception $e) {
    echo $e->getMessage();
}
