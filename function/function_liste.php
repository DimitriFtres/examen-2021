<?php
require_once('data/liste_transactions.php');

function prendreLestransactionsDuMois($transactions, $contacts){
    $tabDate = array();
    $dateDuJour = getdate();
    $transactionDuMois = array();
    $informationParTransaction = array();
    $nom = "";
    $compte = "";
    $i = 0;
    foreach($transactions as $key => $value){
        $tabDate = explode('/', $value["date"]);
        if($tabDate[1] == $dateDuJour["mon"]){
            if($value["montant"] < 0){
                foreach($contacts as $k => $v){
                //nom
                    if($value["destinataire"] == $v["id"]){
                        $nom = $v["nom"]. ' ' . $v["prenom"];
                        $nom = strtoupper($nom);
                    }  
                }
            }else{
                foreach($contacts as $k => $v){
                    if($value["emetteur"] == $v["id"]){
                        $nom = $v["nom"]. ' ' . $v["prenom"];
                        $nom = strtoupper($nom);     
                    }
                }
            }
            foreach($contacts as $k => $v){
                //compte
                $compte = $v["compte"];
                $compte = substr_replace($compte, 'XXXXXXXX', 4, 8);
                $compte = substr_replace($compte, ' ', 4, 0);
                $compte = substr_replace($compte, ' ', 9, 0);
                $compte = substr_replace($compte, ' ', 14, 0);
                $informationParTransaction[$i] = array();
                array_push($informationParTransaction[$i], $value["date"], $nom, $compte);
                $i++;

            }
        }

    }
    return $informationParTransaction;
}
