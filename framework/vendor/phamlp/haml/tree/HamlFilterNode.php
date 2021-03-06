<?php
/* SVN FILE: $Id: HamlFilterNode.php 1 2010-03-21 11:35:45Z chris.l.yates $ */
/**
 * HamlFilterNode class file.
 * @author Chris Yates
 * @copyright Copyright &copy; 2010 PBM Web Development
 * @license http://www.yiiframework.com/license/
 */

/**
 * HamlFilterNode class.
 * Represent a filter in the Haml source.
 * The filter is run on the output from child nodes when the node is rendered.
 * @author Chris Yates
 * @copyright Copyright &copy; 2010 PBM Web Development
 * @license http://www.yiiframework.com/license/
 */
class HamlFilterNode extends HamlNode {
	/**
	 * @var HamlBaseFilter the filter to run
	 */
	private $filter;

	/**
	 * HamlFilterNode constructor.
	 * Sets the filter.
	 * @param HamlBaseFilter the filter to run
	 * @return HamlFilterNode
	 */
	public function __construct($filter) {
	  $this->filter = $filter;
	}

	/**
	* Render this node.
	* The filter is run on the content of child nodes before being returned.
	* @return string the rendered node
	*/
	public function render() {
		$output = '';
		foreach ($this->children as $child) {
			$output .= $child->getContent();
		} // foreach
		return $this->debug($this->filter->run($output));
	}
}