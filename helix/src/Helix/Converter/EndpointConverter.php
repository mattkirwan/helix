<?php

namespace Helix\Converter;

use Helix\HelixEndpoint;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EndpointConverter
{
	public $helixEndpoint;

	public function __construct(HelixEndpoint $helixEndpoint)
	{
		$this->helixEndpoint = $helixEndpoint;
	}

	public function convert($endpoint)
	{
		$endpoint = filter_var($endpoint, FILTER_SANITIZE_STRING);

		$this->helixEndpoint->setSlug($endpoint);

		if(null === $this->helixEndpoint->loadEndpointModel())
		{
			throw new NotFoundHttpException('Page does not exist.', null, 404);
		}

		return $this->helixEndpoint;
	}
}