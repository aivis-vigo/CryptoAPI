<?php declare(strict_types=1);

namespace Models;

class Menu
{
    private ConnectAPI $data;

    public function __construct()
    {
        $this->data = new ConnectAPI();
    }

    public function getTopTen(): ?ConnectAPI
    {
        $this->topTen();
        return null;
    }

    private function topTen()
    {
        $arr = $this->data;
        $currencies = $arr->getConnectData();
        $i = 1;

        foreach ($currencies as $coin) {
            echo "[$i] ID: $coin->id | $coin->name - $coin->symbol | " . number_format($coin->quote->EUR->price, 2) . " € | " .  substr($coin->date_added, 0, 10) . PHP_EOL;
            $i++;
        }
    }
}