<?php
require 'header.php';
require 'bdd/connexion_bdd_et_table.php';
$articles = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Amazon</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <p></p>
    <form class="" action="bdd/ajout_produit/formulaire_upload.php" method="post">
      <center><input type="submit" name="" value="Ajouter un produit"></center>
    </form>
    <div class="pagecss">
      <div class="contenu">

        <?php foreach ($articles as $cli) { ?>
        <div class = "container cadre" >
            <div class = "row" >

                <!-- Image -->
                <div class = "col-sm-12 col-md-2" ><?php echo "<img src='data:image/jpeg;base64," . base64_encode($cli['image']) ."'/>"; ?></div>

                <!-- Description -->
                <div class = "col-md-8" ><p><?php echo $cli['description']; ?></p></div>

                <div class = "col-md-2" >
                    <div class="container">
                        <div class="row">
                            <!-- Prix -->
                            <div class="col-sm-12"><p><?php echo $cli['prix']."€"; ?></p></div>

                            <!-- Acheter -->
                            <div class="col-sm-12"><a href="achat_ok.php" class="myButton">Acheter</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>


      </div>
    </div>
  </body>
</html>
