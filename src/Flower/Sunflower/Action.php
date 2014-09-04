<?php
/**
 * Part of framework-practice project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Flower\Sunflower;

use Joomla\Registry\Registry;

/**
 * Class Action
 *
 * @since 1.0
 */
class Action
{
	public $config;

	public function __construct(Registry $config = null)
	{
		$this->config = $config ? : new Registry;
	}

	public function go(){
		return $this->config->get('where');
	}
}