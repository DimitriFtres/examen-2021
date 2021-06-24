<?php
require_once('function/nouvelleTransaction.php');
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
    <form action="">
        <select name="contact" id="contact">
            <?php foreach($contacts as $k => $v): ?>
            <option value="<?= $v["id"] ?>"><?= $v["prenom"] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" step="0.01">
        <input type="date" value="<?= date("Y-m-d") ?>">
        <input type="hidden" value="1">
        <input type="submit" value='Nouvelle transaction'>
    </form>
</body>
</html>