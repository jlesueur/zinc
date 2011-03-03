<?php
class App extends ZoneApplication
{
	public function init()
	{
		Zoop::loadLib('zone');
		Zoop::loadLib('db');
		if(php_sapi_name() != "cli" || $name != 'session')
			Zoop::loadLib('session');

		//	register classess in the application that extend Zoop classes
		Zoop::registerClass('AppZone', dirname(__file__) . '/extend/AppZone.php');
		Zoop::registerClass('AppGui', dirname(__file__) . '/extend/AppGui.php');
	}
}
