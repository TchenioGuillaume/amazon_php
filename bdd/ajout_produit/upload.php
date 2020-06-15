<?php
require '../../header.php';

$description=$_POST['description'];
$prix=$_POST['prix'];
// $image=$_POST['image'];

if(isset($_POST["submit"])){

    if($description=='')
    {
        echo "Description obligatoire";
        echo '<meta http-equiv="refresh" content="1;URL=upload_image_bdd.php">';
    }
    elseif ($prix=='') {
        echo "Prix obligatoire";
        echo '<meta http-equiv="refresh" content="1;URL=upload_image_bdd.php">';
    }
    else {
        $b = getimagesize($_FILES["image"]["tmp_name"]);
        //Vérifiez si l'utilisateur à sélectionné une image
        if($b !== false){
            //Récupérer le contenu de l'image
            $file = $_FILES['image']['tmp_name'];
            $image = addslashes(file_get_contents($file));

            $host     = 'localhost';
            $username = 'root';
            $password = '';
            $db     = 'amazon';

            //Créer une connexion et sélectionner la base de données
            $db = new mysqli($host, $username, $password, $db);
            $sql = 'SELECT * FROM articles';
            $client = $db->query($sql);

            // Vérifier la connexion
            if($db->connect_error){
                die("Erreur de connexion: " . $db->connect_error);
            }

            //Insérer l'image dans la base de données
            $query = $db->query("INSERT into articles (description, image, prix) VALUES ('$description', '$image', '$prix')");
            if($query){
                echo "Fichier uploadé avec succès.";

                // $derniere_article = $db->query("SELECT description, image, prix FROM articles ORDER BY id DESC LIMIT 0, 1");

                // On foreach la bdd
                // foreach ($client as $cli) {
                //     echo "<p>";
                //     echo $cli['description']." ";
                //     echo $cli['prix']."€";
                //     echo "<img src='data:image/jpeg;base64," . base64_encode($cli['image']) ."'/>";
                //     echo "</p>";
                // }

            }else{
                echo "Échec d'upload du fichier.";
            }
        }else{
            echo "Veuillez sélectionner une image à uploader.";
        }
    }

}
else {
    echo "Je ne suis pas rentrer dans le if";
}
?>
