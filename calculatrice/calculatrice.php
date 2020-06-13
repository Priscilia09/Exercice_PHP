<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Calculatrice</title>
<?php
require_once("./helpers/fonction.php");
require_once("./controllers/base.php");
$errors=[];
$resultat="";
	if(isset($_POST["btn_submit"])){
		//Alternances
		
			//1-Champs vides
			define("NBRE1","nombre1");
			define("NBRE2","nombre2");
			$errors[]=isEmpty($_POST[NBRE1]);
			$errors[]=isEmpty($_POST[NBRE2],"Nombre2 Obligatoire");
			$errors[]=isEmpty($_POST["op"],"Veuillez selectionner un opérateur");
			
			//Pas numérique
			$errors[]=isNumeric($_POST[NBRE1]);
			$errors[]=isNumeric($_POST[NBRE2]);
			
		//Nominal
		if(count($errors)==0){
			$nombre1=$_POST[NBRE1];
			$nombre2=$_POST[NBRE2];
			$op=$_POST["op"];
			$resultat=calculatrice($nbre1,$nbre2,$op);
		}	
	}
?>
  </head>
  <body>
		
		<form action="" method="post">
			<ul>
				<li>
					<label for="">Nombre 1</label>
					<input type="text" name="nombre1">
				</li>
				<li>
					<label for="">Nombre 2</label>
					<input type="text" name="nombre2">
				</li>
				
				<select name="op">
					<option>Sélectionner un opérateur</option>
					<option value="+">Addition</option>
					<option value="-">Soustraction</option>
					<option value="*">Multiplication</option>
					<option value="+">Division</option> 
				</select>
			
			<button type="submit" name="btn_submit" value="envoi">Calculer</button>
				
		</form>
		<div> Resultat:<?php echo$resultat;?></div>
  
  </body>

</html>
