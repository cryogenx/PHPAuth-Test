<?php
	define('api_key','');

//Connection info for Database
	define ('db_type', 'mssql');
	define ('db_host', 'inferno.hernandoclerk.org');
	define ('db_name', 'PHPAuth');
	define ('db_user', 'infernodev');
	define ('db_pass', 'uAMFMbggH5H8');

//Application Settings
	define ('app_name', 'PHPAuth - Api');
	define ('app_version', '0.1 - alpha');

//Default variables
	define ('startPg', '1');
	define ('rowsPerPg', '50');
	define ('sortKey', 'ID');

//create database connection
	// $conn = new PDO("sqlsrv:Server=".db_host.";Database=".db_name, db_user, db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	// if( $conn ) {
	//     session_start();
	// }
	// else
	// {
	//      echo "Connection could not be established.<br />";
	//      die( print_r( sqlsrv_errors(), true));
	// }
?>
