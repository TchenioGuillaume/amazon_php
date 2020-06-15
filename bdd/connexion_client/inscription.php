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

$login=$_POST['login'];
$password=$_POST['password'];

    if (isset($_POST['creer_compte']))

        if($login=='')
        {
            echo "Login obligatoire";
            echo '<meta http-equiv="refresh" content="1;URL=formulaire.php">';
        }
        elseif ($password=='')
        {
            echo "Password obligatoire";
            echo '<meta http-equiv="refresh" content="1;URL=formulaire.php">';
        }
        else
        {
            // insert un client
            $request = $conn->prepare("INSERT INTO client (user, mdp) VALUES (:name, :mdp)");
            $request->bindParam(':name', $login);
            $request->bindParam(':mdp', $password);
            $request->execute();

            echo $login . " : Compte enregistré <br><br>";
            echo "Voir les clients de la BDD : <a href=\"foreach_client_bdd.php\">Clique ici";
        }
 ?>
