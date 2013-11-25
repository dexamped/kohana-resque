<?php defined('SYSPATH') or die('No direct script access.');

// Load Resque config as environment variables
foreach (Kohana::$config->load('resque')->as_array() as $var => $param)
{
	putenv(strtoupper($var).'='.(string)$param);
}
