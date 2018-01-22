<?php 
/*
 * Données de configuration et d'accès à la base de données
 */
$db_host="localhost";
$db_database="php012";
$db_user="root";
$db_password="";
$dblink = new mysqli ($db_host, $db_user, $db_password ,$db_database); // on initialise la connexion à la base de données
?>