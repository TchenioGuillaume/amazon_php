<?php
include '../../header.php';

$dsn = 'mysql:host=localhost;dbname=amazon';
$username = 'root';
$password = '';

//On essaie de se connecter
try {
    $conn = new PDO($dsn, $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'select * from client';
    $client = $conn->query($sql);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

echo "<u>Voici les clients déja enregistré et leur mdp :</u> <br>";
foreach ($client as $cli) {
        echo "- ".$cli['user']." / " .$cli['mdp'] . "<br>";
    }

 ?>
