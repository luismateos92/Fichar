<?php

namespace LuisMateos92\Fichar;

use LuisMateos92\Fichar\ComeIn\ComeIn;
use LuisMateos92\Fichar\GoOut\GoOut;
use Monolog\Logger;

class Execute
{
	private $logger;
	private $comeIn;
	private $goOut;

	public function __construct(
		Logger $logger,
		ComeIn $comeIn,
		GoOut $goOut
	) {
		$this->logger = $logger;
		$this->comeIn = $comeIn;
		$this->goOut = $goOut;
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
