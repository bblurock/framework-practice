<?php
/**
 * Part of learn-architecture project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Provider;

use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Registry\Registry;
use Joomla\Router\RestRouter;
use Joomla\Router\Router;

class RouterProvider implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container $container The DI container.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function register(Container $container)
	{
		/**
		 * Router closure
		 *
		 * @param Container $container
		 *
		 * @return  Router
		 */
		$closure = function($container)
		{
			$input = $container->get('app')->input;

			$router = new RestRouter($input);

			// Use "?_method=PUT" or "?_method=DELETE" to handle PUT and DELETE methods
			$router->setMethodInPostRequest(true);

			$maps = new Registry;

			$maps->loadFile(FLOWER_ETC . '/routing.json');

			$router->addMaps($maps->toArray());

			return $router;
		};

		$container->share('router', $closure);
	}
}
