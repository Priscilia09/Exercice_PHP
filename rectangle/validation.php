<?php
        /*Longueur et Largeur doivent être numériques (entier, réel)
        Longueur positif
        Largeur positif
        Longueur > Largeur*/

    
    //Longueur et Largeur doivent être numériques (entier, réel)
    function is_number($nombre, $errorMessage="Veuillez saisir un nombre"){
        if(is_numeric($nombre)){
            return true;
        } else {
            return $errorMessage;
        }
    }

    //is_positif() teste si un nombre est positif
    //compare() teste si un nombre est superieur à un autre

    function is_positif($nombre, $message = "Entrez un nombre positif"){
        $result = is_number($nombre);
        if($result === true){
            if($nombre > 0){
                return true;
            } else {
                return $message;
            }
        } else {
            return $result;
        }
    }


    function compare($nombre1, $nombre2, $message = "La longueur doit être superieure à la largeur"){
        $result1 = is_positif($nombre1);
        $result2 = is_positif($nombre2);
        $error = [];
        if($result1 !== true){
            $error['longueur'] = $result1;
        }
        if($result2 !== true){
            $error['largeur'] = $result2;
        }
        if(count($error) == 0){
            if($nombre1 > $nombre2){
                return true;
            } else {
                $error['all'] = $message;
            }
        }
        return $error;
    }



    function is_empty($nbre, $sms = "Le nombre est obligatoire"){
        if(empty($nbre) === true){
            return $sms;
        } else {
            return true;
        }
    }

?>