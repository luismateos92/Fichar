<?php

namespace LuisMateos92\Fichar\GoOut;

use LuisMateos92\Fichar\Config;
use GuzzleHttp\Client;
use Monolog\Logger;

class GoOut
{
	private $logger;
	private $config;
	private $guzzle;

	public function __construct(
		Logger $logger,
		Config $config,
		Client $guzzle
	) {
		$this->logger = $logger;
		$this->config = $config;
		$this->guzzle = $guzzle;
	}

	public function goOut()
	{
		$this->logger->info('Cerrar sesión...');
		$this->getGoOut();
		$this->logger->info('Sesión cerrada.');
	}

	/**
	 * Send request to go out.
	 */
	private function getGoOut()
	{
		$this->guzzle->request(
			'GET',
			$this->config->get('url_out')
		);
	}
}
