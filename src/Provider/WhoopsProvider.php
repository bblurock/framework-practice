<?php
/**
 * Part of framework-practice project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Provider;

use Joomla\DI\Container;

/**
 * Class WhoopsProvider
 *
 * @since 1.0
 */
class WhoopsProvider implements \Joomla\DI\ServiceProviderInterface
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
		if (FLOWER_DEBUG)
		{
			$this->container->registerServiceProvider(new WhoopsProvider);
		}

		$whoops = new \Whoops\Run;
		$handler = new \Whoops\Handler\PrettyPageHandler;

		$whoops->pushHandler($handler);
		$whoops->register();

		$container->share('woops', $whoops);
		$container->share('woops.handler', $handler);
	}
}