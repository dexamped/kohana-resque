Kohana Resque
=============

A Kohana module for queuing asynchronous tasks though php-resque.

1. [Installation](#installation)
2. [Writing Tasks](#writing-tasks)
3. [Use with minion](#use-with-minion)

## Installation

#### Install the module

```
git submodule add git@github.com:dexamped/kohana-resque.git modules/kohana-resque
git submodule update --init --recursive
```

#### Load dependencies

We have to load vendor's dependencies by running `composer install`

```
composer install --working-dir=modules/kohana-resque/vendor/php-resque
```

#### Configuration

Edit `application/bootstrap.php` and add the module:

```
Kohana::modules(array(
    ...
    'resque' => 'modules/kohana-resque',
    ...
));
```

Copy the `modules/kohana-resque/config/resque.php` to `APPPATH/config/resque.php` and setup your config.

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

Documentation coming

