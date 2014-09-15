<?php
/**
 * Part of framework-practice project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Provider;

use Flower\Application\Application;
use Joomla\DI\Container;

class ApplicationProvider implements \Joomla\DI\ServiceProviderInterface
{
	protected $app;

	public function __constructor(Application $app)
	{
		$this->app = $app;
	}

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
		$container->protect('app', $this->app);
		$container->protect('input', $this->app->input);
	}
}