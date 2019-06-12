<?php

namespace LuisMateos92\Fichar\ComeIn;

use LuisMateos92\Fichar\Config;
use GuzzleHttp\Client;
use Monolog\Logger;

class ComeIn
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

	public function comeIn()
	{
		$this->logger->info('Iniciando sesión...');
		$this->sendPostLogin();
		$this->getComeIn();
		$this->getPresencia();
		$this->logger->info('Sesión iniciada.');
	}

	/**
	 * Send request to login.
	 *
	 * @return $response
	 */
	private function sendPostLogin()
	{
		$response = $this->guzzle->request(
			'POST',
			$this->config->get('url_post'),
			['form_params' => $this->config->get('user')]
		);
	}

	/**
	 * Send request to get user login page.
	 *
	 * @return $response
	 */
	private function getComeIn()
	{
		$response = $this->guzzle->request(
			'GET',
			$this->config->get('url_login')
		);
	}

	/**
	 * Send request to get init page.
	 *
	 * @return $response
	 */
	private function getPresencia()
	{
		$response = $this->guzzle->request(
			'GET',
			$this->config->get('url_init')
		);
	}
}
