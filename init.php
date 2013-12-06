<?php defined('SYSPATH') or die('No direct script access.');

// Simple autoloader for Resque
class Resque_Autoload {

	public static function autoload($class)
	{
		return Kohana::auto_load($class, 'vendor/php-resque/lib');
	}
}

// Register the autoloader
spl_autoload_register(array('Resque_Autoload', 'autoload'));

// Autoload vendor dependencies
require_once Kohana::find_file('vendor/php-resque', 'vendor/autoload');


// Load Resque config as environment variables
foreach (Kohana::$config->load('resque')->as_array() as $var => $param)
{
	putenv(strtoupper($var).'='.(string)$param);
}
