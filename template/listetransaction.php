<?php
    require_once('function/function_liste.php');
    $liste = prendreLestransactionsDuMois($transactions, $contacts);
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
<ul>
<?php
    foreach($liste as $key => $value){
        echo "<li>".$value[0]." ".$value[1]." ".$value[2]."</li>";
    }
?>
</ul>
</body>
</html>