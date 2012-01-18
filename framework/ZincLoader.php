<?php
class ZincLoader
{
	static private $classes = array();
	
	static public function addClass($classname, $filename)
	{
		self::$classes[strtolower($classname)] = $filename;
	}
	
	static private function getClassPath($className)
	{
		$className = strtolower($className);
		if(isset(self::$classes[$className]))
			return self::$classes[$className];
		
		return false;
	}
	
	static public function echoClasses()
	{
		echo_r(self::$classes);
	}
	
	/**
	 * Automatic class loading handler.  This automatically loads a class using the path
	 * information that was registered using the ZoopLoader::class method 
	 *
	 * @param string $className Name of the class to load
	 */
	static function autoload($className)
	{
		$classPath = ZincLoader::getClassPath($className);
		if($classPath)
			require_once($classPath);
	
		if(substr($className, 0, 5) == 'Zend_')
		{
			// $parts = explode('_', $className);
			// $modName = $parts[1];
			$shortPath = str_replace('_', '/', $className);
			require_once(zoop_dir . "/vendor/zend/$shortPath.php");
		}
	}
}

spl_autoload_register(array('ZincLoader', 'autoload'));
