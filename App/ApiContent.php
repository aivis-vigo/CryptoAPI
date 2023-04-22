<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

class ApiContent
{
    private Client $client;
    private const URL = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest";

    private array $createdCoins;
    public function __construct()
    {
        $this->client = new Client;
    }

    /**
     * @throws GuzzleException
     */
    public function getCollectedCoins(int $limit): array
    {
        return $this->collectCoins($limit);
    }

    /**
     * @throws GuzzleException
     */
    public function fetchAll(int $limit): array
    {
        $parameters = [
            'start' => '1',
            'limit' => $limit,
            'convert' => 'EUR'
        ];

        $response = $this->client->get(self::URL, [
            'headers' => [
                'X-CMC_PRO_API_KEY' => $_ENV["API_KEY"],
                'Accept' => 'application/json',
            ],
            'query' => $parameters
        ]);
        $cryptoData = json_decode($response->getBody()->getContents());
        return $cryptoData->data;
    }

    /**
     * @throws GuzzleException
     */
    private function collectCoins(int $limit): array
    {
        $coins = $this->fetchAll($limit);
        foreach ($coins as $coin) {
            $this->createdCoins[] = $this->createCoin($coin);
        }
        return $this->createdCoins;
    }

    private function createCoin(stdClass $coinToCreate): Coin
    {
        return new Coin(
            $coinToCreate->id,
            $coinToCreate->name,
            $coinToCreate->symbol,
            $coinToCreate->date_added,
            $coinToCreate->total_supply,
            $coinToCreate->quote->EUR->price,
            $coinToCreate->quote->EUR->volume_change_24h,
            key($coinToCreate->quote)
        );
    }
}