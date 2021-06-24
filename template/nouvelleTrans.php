<?php
require_once('data/liste_transactions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="traitement.php" method="POST">
        <select name="destinataire" id="contact">
            <?php foreach($contacts as $k => $v): ?>
            <option value="<?= $v["id"] ?>"><?= $v["prenom"] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="montant" step="0.01">
        <input type="date" name="date" value="<?= date("Y-m-d") ?>">
        <input type="hidden" value="1" name="emetteur">
        <input type="submit" value='Nouvelle transaction'>
    </form>
    <?php if(!empty($_GET["error"])){
        echo "Il y a une erreur";
    }
    ?>
</body>
</html>