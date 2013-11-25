<?php defined('SYSPATH') or die('No direct script access.');

abstract class Minion_Task extends Kohana_Minion_Task {

	public static function factory($options)
	{
		if (getenv('RESQUE'))
		{
			$options = array('task' => 'resque');
		}

		return parent::factory($options);
	}
}
