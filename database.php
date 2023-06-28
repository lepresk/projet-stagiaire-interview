<?php 
// Déclaration des constante pour la connection à la base de donnée
	define('HOST', 'localhost');
	define('DB_NAME', 'gestion_stagiaires');
	define('USER', 'root');
	define('PASS', '');

	//Connecxion à la base de donnée
	try{
		$db = new PDO("mysql:host=" .HOST. ";charset=utf8;dbname=" .DB_NAME, USER, PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}   
	catch(PDOexception $e){
		echo $e;
	}
 ?>