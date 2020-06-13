<?php
 function listPremiers($n){
    $negatif = false;
    $list = array();
    if($n < 0){
        $negatif = true;
        $n = -$n;
    }
    for($i = 2;$i<=$n;$i++){
        $nbDiv = 0;//Et on compte le nombre de diviseur    
        for($j = 1;$j <= $i;$j ++){
            if($i % $j==0){
                $nbDiv++;            
            }
        }
        if($nbDiv == 2){
//Un nombre premier est un chiffre qui ne possède que 2 diviseur (1 et
// lui-même)
           $list[] = $i;
        }
    }
    return $list;
}
function getAverageOf($tab){
    //Fontion de calcul de la moyenne du tableau $tab passé en paramètre
    $avg = 0;
    $i = 0;
    for($i = 0;$i < count($tab)-1;$i ++){
        $avg += $tab[$i];
    }
    return $avg/count($tab);
}
function getComparedWAvg($tab, $avg){
// Ici, nous allons générer le tableau associatif qui permet de faire les comparaisons
    $compared = array();
    foreach($tab as $valeur){
        if($valeur < $avg){
            $compared[] = array(
                'Clé' => 'Inférieur',
                'Valeur' => $valeur
            );
        }
        elseif($valeur > $avg){
            $compared[] = array(
                'Clé' => 'Supérieur',
                'Valeur' => $valeur
            );
        }
    }
    return $compared;
}

//Voici de maniere simple le truc que tu as demandé
$T1 = listPremiers($_POST['value']);
$avg = getAverageOf($T1);
$T = getComparedWAvg($T1, $avg);
echo "Voici la liste des nombres premiers compris entre 0 et".$_POST['value']."<br>"; 
for($i = 0;$i < count($T1);$i ++){
    echo $T1[$i];
    echo "<br>";
}

echo "La moyenne de ce tableau est ".$avg."<br>";
echo "Voici le tableau associatif correspondant <br>"; 
foreach($T as $valeur){
    echo $valeur['Clé']."  =>   ";
    echo $valeur['Valeur'];
    echo "<br>";
}
?>