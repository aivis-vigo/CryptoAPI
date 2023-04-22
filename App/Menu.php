<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Exception\GuzzleException;

class Menu
{
    private ApiContent $menu;

    public function __construct()
    {
        $this->menu = new ApiContent();
    }

    /**
     * @throws GuzzleException
     */
    public function run(): void
    {
        while (true) {
            echo "========Crypto currencies========" . PHP_EOL;
            echo " - List currencies (1)" . PHP_EOL;
            echo " - Exit (2)" . PHP_EOL;
            $userChoice = readline("Select: ");

            switch ($userChoice) {
                case 1:
                    echo "============================" . PHP_EOL;
                    $this->displayCoins();
                    break;
                case 2:
                    exit();
                default:
                    break;
            }
        }
    }

    /**
     * @throws GuzzleException
     */
    private function displayCoins(): void
    {
        $userInput = (int)readline("Number of top currencies: ");
        $limit = count($this->menu->fetchAll($userInput));
        $coinsToDisplay = $this->menu->getCollectedCoins($limit);

        foreach ($coinsToDisplay as $coin) {
            /** @var Coin $coin */
            echo "{$coin->getName()}:" . PHP_EOL;
            echo " - ID: {$coin->getID()}" . PHP_EOL;
            echo " - Symbol: {$coin->getSymbol()}" . PHP_EOL;
            echo " - Price: " . number_format($coin->getPrice(), 2) . " {$coin->getCurrency()}" . PHP_EOL;
            echo " - Total supply: {$coin->getTotalSupply()} {$coin->getSymbol()}" . PHP_EOL;
            echo " - 24h volume: " . $coin->getVolumeChange24h(). " %" .  PHP_EOL;
            echo " - Active since: " . substr($coin->getDateAdded(), 0, 10) . PHP_EOL;
            echo PHP_EOL;
        }
    }
}