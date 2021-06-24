<?php
require_once('function/nouvelleTransaction.php');
verifications($_POST, $contacts);
if(ajoutDansLaListe($_POST, $contacts, $transactions)){
    header('Location: index.php');
}else{
    header('Location: nouvelleTransaction.php?error=1');
}