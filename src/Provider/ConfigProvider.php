<?php
/**
 * Part of framework-practice project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */ 

namespace Provider;

use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

class ConfigProvider implements  ServiceProviderInterface
{
	protected $config;
	
	public function __construct(\Joomla\Registry\Registry $config){
		$this->config = $config; 
	}

	public function register(Container $container){
		$file = FLOWER_ETC . '/config.json';

		if (!is_file($file))
		{
			echo "Please copy etc/config.dist.json to etc/config.json";

			die;
		}

		$this->config->loadFile($file);

		$container->share('config', $this->config);
	}
}