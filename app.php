<?php
#!/usr/bin/env php

require __DIR__.'/vendor/autoload.php';
use verofeev\Brackets;

if (php_sapi_name() != 'cli') {
	throw new Exception("working only in CLI", 1);
}

$params = getopt("", ["file::"]);

if (!isset($params['file'])) {
	throw new Exception("file not sent", 1);
} elseif (!file_exists($params['file'])) {
	throw new Exception("file not exist", 1);
} else {
	$bracketsString = file_get_contents($params['file']);
	if(!trim($bracketsString)) {
		throw new Exception("file is empty", 1);
	}
	$bracketsChecker = new Brackets($bracketsString);
	echo $bracketsChecker->validate()?'brackets in file is valid':'brackets in file NOT valid';
}