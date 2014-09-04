<?php
/**
 * Part of framework-practice project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Provider;

use Flower\Sunflower\Action;
use Joomla\DI\Container;

class ActionProvider implements \Joomla\DI\ServiceProviderInterface
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
		$container->get('config')->set('where', 'Taipei1');

		$container->share(
			'sunflower.action',
			function($container)
			{
				$action = new Action($container->get('config'));

				return $action;
			}
		);
	}
}