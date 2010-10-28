<?php
class App extends ZoneApplication
{
	public function init()
	{
		Zoop::loadLib('zone');
		Zoop::loadLib('db');
		Zoop::loadLib('session');
		Zoop::loadLib('zend');
		Zoop::loadLib('form');

		//	register classess in the application that extend Zoop classes
		Zoop::registerClass('AppZone', dirname(__file__) . '/extend/AppZone.php');
		Zoop::registerClass('AppGui', dirname(__file__) . '/extend/AppGui.php');

		//	register domain classess in the application
		Zoop::registerClass('RequestApp', dirname(__file__) . '/domain/RequestApp.php');
		Zoop::registerClass('Person', dirname(__file__) . '/domain/Person.php');
		Zoop::registerClass('Request', dirname(__file__) . '/domain/Request.php');
		Zoop::registerClass('Filter', dirname(__file__) . '/domain/Filter.php');
		Zoop::registerClass('Attachment', dirname(__file__) . '/domain/Attachment.php');
		Zoop::registerClass('Comment', dirname(__file__) . '/domain/Comment.php');

		//	register the zones
		Zoop::registerClass('ZoneFilter', dirname(__file__) . '/zones/ZoneFilter.php');
	}
}
