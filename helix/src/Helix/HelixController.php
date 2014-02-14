<?php

namespace Helix;

//use Helix\HelixEndpoint;

class HelixController
{
	public function init($endpoint)
	{
		echo $endpoint.';';
		//return $this->endpoint->getRawEndpointString();
		return 'HELIX!!';	
	}
}