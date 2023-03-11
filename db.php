<?php
    // Database config variables

	/*
	// Server
	define("DB_HOST","0.0.0.0");
	define("DB_USER","user");
	define("DB_PASSWORD","userpass");
	define("DB_DATABASE","database");*/

	// Local
	define("DB_HOST","127.0.0.1");
	define("DB_USER","root");
	define("DB_PASSWORD","root");
	define("DB_DATABASE","dev_test");

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
?>