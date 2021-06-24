<?php
require_once('data/liste_transactions.php');

function verifications(array $input, $contacts){
    //destinataire connu
    $verification = true;
    $destinataireOK = false;
    foreach($contacts as $key => $value){
        if($input["destinataire"] == $value["id"]){
            $destinataireOK = true;
        }
    }
    if(!$destinataireOK){
        $verification = false;
    }
    //montant valide
    if(!is_float(floatval($input["montant"]))){
        $verification = false;
    }
    //date valide
    if($input["date"] < date("Y-m-d")){
        $verification = false;
    }
    return $verification;
}
function ajoutDansLaListe(array $input, $contacts, $transactions){
    $toutCEstBienPasse = false;
    if(verifications($input, $contacts)){
        array_push($transaction, $input);
            $toutCEstBienPasse = true;
    }
    return $toutCEstBienPasse;
}
verifications($_POST, $contacts);

