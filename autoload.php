<?php

spl_autoload_register(function ($class) {
	$prefix = '';
	$base_dir = __DIR__ . "/";
	$class_name = str_replace($prefix, '', $class);
	$file = $base_dir . str_replace('\\', '/', $class_name) . '.php';

	if (file_exists($file)) {
		require $file;
	}
});
