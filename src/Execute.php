<?php

namespace LuisMateos92\Fichar;

use LuisMateos92\Fichar\ComeIn\ComeIn;
use Monolog\Logger;

class Execute
{
	private $logger;
	private $comeIn;

	public function __construct(
		Logger $logger,
		ComeIn $comeIn
	) {
		$this->logger = $logger;
		$this->comeIn = $comeIn;
	}

	public function execute(string $action)
	{
		$this->logger->info('Start fichar');
		switch ($action) {
			case 'comeIn':
				$this->comeIn->comeIn();
				break;
			case 'goOut':
				$this->comeIn->comeIn();
				$this->goOut->goOut();
				break;
		}
	}
}
