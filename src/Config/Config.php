<?php

namespace LuisMateos92\Fichar;

class Config
{
	private $config;

	public function __construct()
	{
		$this->config = include __DIR__ . '/../../config/config.php';
	}

	public function get(string $key)
	{
		return $this->config[$key];
	}
}
