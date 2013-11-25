<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Task_Resque extends Minion_Task {

	/**
	 * @var  string  Name of the queue
	 */
	protected $_queue = NULL;

	public function __construct()
	{
		$this->_accepted_options = array_keys($this->_options);
	}

	/**
	 * Enqueue a Resque task if it's called directly from minion
	 *
	 * @param  array  Args
	 */
	public function _execute(array $params)
	{
		// Skip this task if resque is being called directly (minion workaround)
		if (get_class($this) === 'Task_Resque')
			return;

		$token = Resque::enqueue($this->_queue, get_class($this), $params, true);

		Minion_CLI::write('Created resque job '.$token);
	}

} // End Kohana_Task_Resque
