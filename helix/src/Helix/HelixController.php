<?php

namespace Helix;

use Silex\Application;

class HelixController
{
	private $app;

	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	public function boot($endpoint)
	{
		$layout = 'A Layout string';

		$templates = $endpoint->loadTemplates();

		//$templateNames = $endpoint->loadTemplateNames();

		foreach($templates->baseTemplate->layoutTemplate->componentTemplates as $componentTemplate)
		{

		}		

		// $baseTemplate = $endpoint->getBaseTemplate();

		// $layoutTemplate = $baseTemplate->layoutTemplate;

		// $componentTemplates = $layoutTemplate->componentTemplates;

		//LayoutTemplate::find(1);

		echo '<pre>';
		print_r($this->app['converter.endpoint']);
		echo '</pre>';

		return $this->app['twig']->render('layout-template-1.html.twig', array(
			'component' => 'A COMPONENT',
			'layout' => $layout,
			'base_template' => $endpoint->getBaseTemplateName(),
		));


		return 'A BIG STRING CONTAINING THE PAGE!';
	}
}