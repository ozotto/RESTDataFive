<?php
function getDB() {
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="1234";
	$dbname="FIVE";
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConnection;
}
?>