<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$db     = 'amazon';

//Créer une connexion et sélectionner la base de données
$db = new mysqli($host, $username, $password, $db);
$sql = 'SELECT * FROM articles';
$client = $db->query($sql);
?>
