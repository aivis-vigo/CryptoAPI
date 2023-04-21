<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

use Models\App;

$application = new App();
$application->getMainMenu();
/**
$url = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest";
$api = "f882b284-925c-42cd-8644-7f1c9d152d2c";

$parameters = [
    'start' => '1',
    'limit' => '10',
    'convert' => 'EUR'
];

$headers = [
    'Accepts: application/json',
    "X-CMC_PRO_API_KEY: $api"
];
$qs = http_build_query($parameters);
$request = "$url?$qs";


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $request,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => 1
));

$response = curl_exec($curl);
$responseData = json_decode($response);
$currency = $responseData->data;
$i = 1;

foreach ($currency as $coin) {
    echo "[$i] ID: $coin->id | $coin->name - $coin->symbol | " . number_format($coin->quote->EUR->price, 2) . " € | " .  substr($coin->date_added, 0, 10) . PHP_EOL;
    $i++;
}
 * */