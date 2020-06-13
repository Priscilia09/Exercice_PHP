<?php
//tester si un nombre est vide
function isEmpty($nbre,$sms=null){
	if(empty($nbre)){
		if($sms==null){
		 $sms="Le Nombre est obligatoire";
		}
		return $sms;
	}
}
	
function isNumeric($nbre,$sms=null){
	if(is_numeric($nbre)){
		if($sms==null){
		 $sms="Le Nombre doit etre un numérique";
		}
		return $sms;
	}
	
}


?>