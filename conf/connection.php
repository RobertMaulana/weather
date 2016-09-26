<?php

	$db['db_host']          = 'localhost';
	$db['db_username']      = 'root';
	$db['db_pass']          = '';
	$db['db_name']          = 'wilayah';

	foreach ($db as $key=>$value){
	    define(strtoupper($key),$value);
	}

	$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);

?>