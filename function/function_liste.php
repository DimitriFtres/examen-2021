<?php
require_once('data/liste_transactions.php');

function prendreLestransactionsDuMois($transactions, $contacts){
    $tabDate = array();
    $dateDuJour = getdate();
    $transactionDuMois = array();
    $informationParTransaction = array();
    $nom = "";
    $compte = "";
    $montant = NULL;
    $i = 0;
    foreach($transactions as $key => $value){
        $tabDate = explode('/', $value["date"]);
        if($tabDate[1] == $dateDuJour["mon"]){
            $montant = $value["montant"];
                foreach($contacts as $k => $v){
                //nom
                    if($value["destinataire"] === $v["id"]){
                        $nom = $v["nom"]. ' ' . $v["prenom"];
                        $nom = strtoupper($nom);
                    }  
                }
            
            foreach($contacts as $k => $v){
                //compte
                $compte = $v["compte"];
                $compte = substr_replace($compte, 'XXXXXXXX', 4, 8);
                $compte = substr_replace($compte, ' ', 4, 0);
                $compte = substr_replace($compte, ' ', 9, 0);
                $compte = substr_replace($compte, ' ', 14, 0);
            }
            $informationParTransaction[$i] = array();
            array_push($informationParTransaction[$i], $value["date"], $nom, $montant, $compte);
            $i++;
        }
        

    }
    return $informationParTransaction;
}
