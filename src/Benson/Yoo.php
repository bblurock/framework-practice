<?php
/**
 * Part of framework-practice project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Benson;

use Joomla\Application\AbstractWebApplication;

include_once __DIR__ . '/../vendor/autoload.php';

/**
 * Class Yoo
 *
 * @since 1.0
 */
class Yoo extends AbstractWebApplication
{

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
		echo "Yooooo~~~";
	}
}