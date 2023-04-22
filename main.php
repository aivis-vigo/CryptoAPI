<?php declare(strict_types=1);

require_once 'vendor/autoload.php';
use App\Menu;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$application = new Menu();
try {
    $application->run();
} catch (GuzzleHttp\Exception\GuzzleException $e) {
    return $e;
}
