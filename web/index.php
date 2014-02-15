<?php

define('HELIX_APP_DIR', __DIR__.'/../helix/');

require HELIX_APP_DIR.'vendor/autoload.php';

$app = new \Silex\Application();

$app['debug'] = true;

$app->register(new \Silex\Provider\ServiceControllerServiceProvider());

$app->register(new \Helix\Provider\CapsuleServiceProvider, array(    
    'capsule.connection' => array(
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'helix',
        'username'  => 'root',
        'password'  => 'root',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ),
));

$app->register(new \Silex\Provider\TwigServiceProvider, array(
    'twig.path' => array(
        HELIX_APP_DIR.'templates/base',
        HELIX_APP_DIR.'templates/layout',
    )
));

$app->register(new \Helix\Provider\HelixTemplateServiceProvider);

$app['helix.controller'] = $app->share(function() use ($app) {
	return new \Helix\HelixController($app);
});

$app['converter.endpoint'] =  $app->share(function() use ($app) {
	return new \Helix\Converter\EndpointConverter(
		new \Helix\HelixEndpoint(
			new \Helix\Model\Endpoint()
		)
	);
});




$app->get('/{endpoint}', "helix.controller:boot")
->convert('endpoint', 'converter.endpoint:convert')
->assert('endpoint', ".*");

$app->run();