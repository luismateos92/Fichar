<?php

require_once __DIR__ . '/vendor/autoload.php';

use LuisMateos92\Fichar\Config;
use LuisMateos92\Fichar\Execute;
use LuisMateos92\Fichar\ComeIn\ComeIn;
use GuzzleHttp\Client;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('test');
$logger->pushHandler(
	new StreamHandler(__DIR__ . '/log/fichar.log', Logger::DEBUG)
);
$config = new Config();
$guzzle = new Client(['cookies' => true]);

$execute = new Execute(
	$logger,
	new ComeIn(
		$logger,
		$config,
		$guzzle
	)
);

$option = -1;
echo "======[FICHAR]======\n";
echo "0.- Fichar entrada\n";
echo "1.- Fichar salida\n";
while ($option < 0 || $option > 1) {
	$option = readline('Select an option: ');
	switch ($option) {
		case 0:
			$execute->execute('comeIn');
			break;
		case 1:
			$execute->execute('goOut');
			break;
	}
}
