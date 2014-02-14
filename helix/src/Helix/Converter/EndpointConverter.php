<?php

namespace Helix\Converter;

use Helix\HelixEndpoint;

class EndpointConverter
{
	private $endpoint;

	public function __construct(HelixEndpoint $endpoint)
	{
		$this->endpoint = $endpoint;
	}

	public function convert($rawEndpointString)
	{
		$this->endpoint->setRawEndpointString($rawEndpointString);
		return $this->endpoint;
	}
}