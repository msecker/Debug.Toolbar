<?php
namespace Debug\Toolbar\Http;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Debug\Toolbar\Service\DataStorage;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Http\Component\ComponentContext;
use TYPO3\Flow\Http\Component\ComponentInterface;

/**
 * ...
 */
class InitComponent implements ComponentInterface {

	/**
	 * @param ComponentContext $componentContext
	 * @return void
	 */
	public function handle(ComponentContext $componentContext) {
		DataStorage::set('Runtime:Start', microtime(TRUE));
		DataStorage::save();
	}

}