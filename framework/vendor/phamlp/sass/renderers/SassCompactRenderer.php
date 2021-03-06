<?php
/* SVN FILE: $Id: SassCompactRenderer.php 1 2010-03-21 11:35:45Z chris.l.yates $ */
/**
 * SassCompactRenderer class file.
 * Rules are on single lines.
 * @package sass
 * @author Chris Yates
 * @copyright Copyright &copy; 2010 PBM Web Development
 * @license http://www.yiiframework.com/license/
 */

/**
 * SassCompactRenderer class.
 * @package sass
 * @author Chris Yates
 */
class SassCompactRenderer extends SassRenderer {
	/**
	 * Renders the brace between the selectors and the properties
	 * @return string the brace between the selectors and the properties
	 */
	protected function between() {
	  return ' { ';
	}

	/**
	 * Renders a directive.
	 * @param SassNode the node being rendered
	 * @param array properties of the directive
	 * @return string the rendered directive
	 */
	public function renderDirective($node, $properties) {
		return str_replace("\n", '', parent::renderDirective($node, $properties)) .
			"\n\n";
	}

	/**
	 * Renders properties.
	 * @param array properties to render
	 * @return string the rendered properties
	 */
	public function renderProperties($properties) {
		return join(' ', $properties);
	}

	/**
	 * Renders a rule.
	 * @param SassNode the node being rendered
	 * @param array rule properties
	 * @param string rendered rules
	 * @return string the rendered directive
	 */
	public function renderRule($node, $properties, $rules) {
		return parent::renderRule($node, $properties,
			str_replace("\n\n", "\n", $rules)) . "\n";
	}

	/**
	 * Renders rule selectors.
	 * @param SassNode the node being rendered
	 * @return string the rendered selectors
	 */
	protected function renderSelectors($node) {
		$selectors = '';
		foreach ($node->selectors as $line) {
			$selectors .= $this->getIndent($node) . join(', ', $line) . ",";
		} // foreach
	  return substr($selectors, 0, -1);
	}
}