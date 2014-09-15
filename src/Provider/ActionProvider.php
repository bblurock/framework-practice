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

class ActionProvider implements ServiceProviderInterface
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
		$container->get('config')->set('where', 'Taipei');

		$container->share(
			'sunflower.action',
			function ($container)
			{
				$config = $container->get('config');
				$action = new Action($config);

				return $action;
			}
		);
	}
}
