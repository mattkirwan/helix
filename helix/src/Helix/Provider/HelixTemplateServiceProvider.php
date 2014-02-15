<?php

namespace Helix\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Helix\Template\HelixTemplate;
use Helix\Model\BaseTemplate;
use Helix\Model\LayoutTemplate;
use Helix\Model\ComponentTemplate;

class HelixTemplateServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
    	$app['helix.template.base'] = $app->share(function($app) {
    		return new HelixTemplate(new BaseTemplate());
    	});

    	$app['helix.template.layout'] = $app->share(function($app) {
    		return new HelixTemplate(new LayoutTemplate());
    	});

    	$app['helix.template.component'] = $app->share(function($app) {
    		return new HelixTemplate(new ComponentTemplate());
    	});
    }

    public function boot(Application $app)
    {

    }    
}