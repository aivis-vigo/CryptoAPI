<?php declare(strict_types=1);

namespace App;

class Coin
{
    private int $id;
    private string $name;
    private string $symbol;
    private string $dateAdded;
    private float $totalSupply;
    private float $price;
    private float $volumeChange24h;
    private  string $currency;

    public function __construct(
        int $id,
        string $name,
        string $symbol,
        string $dateAdded,
        float $totalSupply,
        float $price,
        float $volumeChange24h,
        string $currency
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->symbol = $symbol;
        $this->dateAdded = $dateAdded;
        $this->totalSupply = $totalSupply;
        $this->price = $price;
        $this->volumeChange24h = $volumeChange24h;
        $this->currency = $currency;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getDateAdded(): string
    {
        return $this->dateAdded;
    }

    public function getTotalSupply(): float
    {
        return $this->totalSupply;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getVolumeChange24h(): float
    {
        return $this->volumeChange24h;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}