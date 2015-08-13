<?php
namespace Debug\Toolbar\ViewHelpers\Format;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Debug.Toolbar".         *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Utility\TypeHandling;
use TYPO3\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

/**
 * A simple ViewHelper to render a value independently of its type
 */
class ValueViewHelper extends AbstractConditionViewHelper {

	/**
	 * @var boolean
	 */
	protected $escapeChildren = FALSE;

	/**
	 * @param mixed $value
	 * @return string the rendered string
	 */
	public function render($value = NULL) {
		if ($value === NULL) {
			$value = $this->renderChildren();
		}
		if (is_object($value)) {
			return '[' . TypeHandling::getTypeForValue($value) . ']';
		}
		return (string)$value;
	}

}

?>