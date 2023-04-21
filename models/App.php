<?php declare(strict_types=1);

namespace Models;

class App
{
    private Menu $menuData;

    public function __construct()
    {
        $this->menuData = new Menu();
    }

    public function getMainMenu()
    {
        return $this->mainMenu();
    }

    private function mainMenu(): string
    {
        echo "========Crypto currencies========" . PHP_EOL;
        echo " - List TOP 10 currencies (1)" . PHP_EOL;
        echo " - Exit (2)" . PHP_EOL;

        $userChoice = readline("Select: ");

        while (true) {
            switch ($userChoice) {
                case 1:
                    echo "============================" . PHP_EOL;
                    echo "Top 10:" . PHP_EOL;
                    $this->menuData->getTopTen();
                    break;
                case 2:
                    exit();
                default:
                    echo "Invalid input!" . PHP_EOL;
                    break;
            }
        }
    }
}