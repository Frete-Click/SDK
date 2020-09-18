# SDK

SDK para a API da plataforma Frete Click
https://api.freteclick.com.br


# Instalação
composer require freteclick/sdk

#Uso

<pre>
use SDK\SDK;
use SDK\Models\QuoteRequest;

$api_key = 'private';
$SDK = new SDK($api_key);
$cotafacil = $SDK->cotaFacilClient();

$QuoteRequest = new QuoteRequest();
$result = $cotafacil::quote($QuoteRequest);
 
 print_r($result);
</pre>
