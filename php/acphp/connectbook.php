<?php
	$dsn="mysql:host=localhost;port=3306;dbname=dd101g4;charset=utf8";
	$user="root";
	$password="";
	$options=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO($dsn, $user, $password, $options);
?>