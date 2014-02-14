<?php

define('HELIX_APP_DIR', __DIR__.'/../helix/');

require HELIX_APP_DIR.'vendor/autoload.php';

$app = new \Silex\Application();

$app['debug'] = true;


$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app['helix.controller'] = $app->share(function() use ($app) {
	return new \Helix\HelixController();
});

$app->get('/{endpoint}', "helix.controller:init")
->assert('endpoint', ".*");

$app->run();