<?php include 'connexion_table_insert_client.php'; ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
</head>
<body>
    <?php foreach($client as $cli): ?>
      <p>client est <?php echo $cli['user']; ?> et le mot de passe est <?php echo $cli['mdp']; ?></p>
    <?php endforeach; ?>

</body>
</html>
