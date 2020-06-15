<?php
include 'connexion_bdd.php';

//On essaie de se connecter
try {
    $conn = new PDO($dsn, $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'select * from client';
    $client = $conn->query($sql);

    // insert un client donnée dans une variable $name et $mdp
    $request = $conn->prepare("INSERT INTO client (user, mdp) VALUES (:name, :mdp)");
    $request->bindParam(':name', $name);
    $request->bindParam(':mdp', $mdp);
    $name = 'Gui';
    $mdp = 'gui';
    $request->execute();


} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
