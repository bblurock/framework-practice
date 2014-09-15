<?php
/**
 * Part of framework-practice project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Flower\Application;

use Joomla\Application\AbstractWebApplication;
use Joomla\Application\Web;
use Joomla\DI\Container;
use Joomla\Input\Input;
use Joomla\Registry\Registry;
use Provider\ActionProvider;
use Provider\ConfigProvider;
use Provider\WhoopsProvider;

class Application extends AbstractWebApplication
{
	/**
	 * Property container.
	 *
	 * @var  \Joomla\DI\Container
	 */
	public $container;

	/**
	 * @param Input         $input
	 * @param Registry      $config
	 * @param Web\WebClient $client
	 */
	public function __construct(Input $input = null, Registry $config = null, Web\WebClient $client = null)
	{
		$this->container = new Container;

		parent::__construct($input, $config, $client);
	}

	/**
	 * initialise
	 *
	 * @return  void
	 */
	protected function initialise()
	{
		$this->container->registerServiceProvider(new ConfigProvider($this->config));

		define('FLOWER_DEBUG', $this->get('system.debug'));

		$this->container->share('app', $this);

		$this->container
			->registerServiceProvider(new ActionProvider)
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
		/** @var $action \Flower\Sunflower\Action */
		$action = $this->container->get('sunflower.action');

		echo $action->go();
	}
}