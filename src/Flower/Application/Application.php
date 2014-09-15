<?php
/**
 * Part of learn-architecture project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Flower\Application;

use Provider\RouterProvider;
use Joomla\Controller\AbstractController;
use Provider\ActionProvider;
use Provider\ApplicationProvider;
use Provider\ConfigProvider;
use Provider\WhoopsProvider;
use Joomla\Application\AbstractWebApplication;
use Joomla\Application\Web;
use Joomla\DI\Container;
use Joomla\Input\Input;
use Joomla\Registry\Registry;
use Joomla\Router\Router;

class Application extends AbstractWebApplication
{
	/**
	 * Property container.
	 *
	 * @var  \Joomla\DI\Container
	 */
	public $container;

	public function __construct(Input $input = null, Registry $config = null, Web\WebClient $client = null)
	{
		$this->container = new Container;

		parent::__construct($input, $config, $client);
	}

	protected function initialise()
	{
		$this->container->registerServiceProvider(new ConfigProvider($this->config));

		define('FLOWER_DEBUG', $this->get('system.debug', false));

		$this->container
			->registerServiceProvider(new ApplicationProvider($this))
			->registerServiceProvider(new ActionProvider)
			->registerServiceProvider(new RouterProvider)
			->registerServiceProvider(new WhoopsProvider);
	}

	/**
	 * Method to run the application routines.  Most likely you will want to instantiate a controller
	 * and execute it, or perform some sort of task directly.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function doExecute()
	{
		$controller = $this->getController();

		echo $controller->execute();
	}

	/**
	 * getController
	 *
	 * @return  AbstractController
	 */
	protected function getController()
	{
		$route = $this->get('uri.route');
		$route = str_replace('index.php', '', $route);

		/** @var Router $router */
		$router = $this->container->get('router');

		$router->setControllerPrefix('Flower\\Controller\\');
		$router->setDefaultController('Sakura\\DisplayController');

		$controller = $router->getController($route);

		return $controller;
	}
}
