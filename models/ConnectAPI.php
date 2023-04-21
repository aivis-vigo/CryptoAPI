<?php declare(strict_types=1);

namespace Models;

class ConnectAPI
{
    private string $api = "f882b284-925c-42cd-8644-7f1c9d152d2c";
    private const URL = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest";
    public function getConnectData(): array
    {
        return $this->connect();
    }

    private function connect(): array
    {
        $parameters = [
            'start' => '1',
            'limit' => '10',
            'convert' => 'EUR'
        ];

        $headers = [
            'Accepts: application/json',
            "X-CMC_PRO_API_KEY: $this->api"
        ];
        $qs = http_build_query($parameters);
        $request = self::URL . "?$qs";


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => 1
        ));

        $response = curl_exec($curl);
        $responseData = json_decode($response);
        return $responseData->data;
    }
}