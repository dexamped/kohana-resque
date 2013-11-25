Kohana Resque
=============

A Kohana module for queuing asynchronous tasks though php-resque.

1. [Installation](#installation)
2. [Writing Tasks](#writing-tasks)
3. [Use with minion](#use-with-minion)

## Installation

#### Install the module

```
git submodule add git@github.com:dexamped/kohana-resque.git
git submodule update --init
```

#### Load dependencies

Install php-resque with composer by updating your `composer.json`

```
"require": {
	...
	"chrisboulton/php-resque": "dev-master",
	...
}
```

and running `composer install`

#### Configuration

Edit `application/bootstrap.php` and add the module:

```
Kohana::modules(array(
    ...
    'resque' => 'modules/kohana-resque',
    ...
));
```

See `MODPATH/kohana-resque/config/resque.php` for full configuration options.

#### Running workers

From the shell: `./modules/kohana-resque/resque`

## Writing Tasks

Create a new Task: `application/classes/Task/Mytask.php`

```php
class Task_Test extends Task_Resque {

	protected $_queue = 'myqueuename';

	public function perform()
	{
		echo "Executing a task!\n";
	}

} // End Task_Test
```

## Use with Minion

Coming

