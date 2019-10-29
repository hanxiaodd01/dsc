<?php
//多点乐资源
function classLoader($class)
{
	$path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	$file = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $path . '.php';

	if (file_exists($file)) {
		require_once $file;
	}
}

spl_autoload_register('classLoader');
