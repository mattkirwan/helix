<?php

namespace Helix;

class HelixEndpoint
{
	private $rawEndpointString;

	public function setRawEndpointString($rawEndpointString)
	{
		$this->rawEndpointString =  $rawEndpointString;
	}

	public function getRawEndpointString()
	{
		return $this->rawEndpointString;
	}
}