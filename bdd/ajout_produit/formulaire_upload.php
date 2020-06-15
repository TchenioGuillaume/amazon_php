<?php require '../../header.php'; ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <br>
        <form enctype="multipart/form-data" action="upload.php" method="post">
            <p>Description du produit : <textarea name="description" rows="4" cols="40"></textarea></p>
            <p> Prix : <input type="text" name="prix"> €</p>
            <p> Uploader le fichier image : <input name="image" type="file"/></p>
            <p><input type="submit" name="submit" value="Uploader"/></p>
        </form>
    </body>
</html>
