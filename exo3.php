<?php

try {
	$connexion = new PDO("mysql:dbname=repertoire;host=localhost", "root" , "");
} catch (PDOException $e) {
	echo 'Connexion échouée : ' . $e->getMessage();
}


function explode2($chaine) {
	$t = explode(',', $chaine);
	foreach($t as $e) {
		list($k, $v) = explode('|', $e);
		$tab[$k] = $v;
	}
	return $tab;
}
if(!empty($_POST)){
	$chaine = $_POST['telephone'];
	$numero = explode2($chaine);

	foreach($numero as $num['key'] =>$value) 
	{
		$numero = $connexion->prepare("INSERT INTO telephone(operateur, numero) VALUES(:operateur, :numero)");
		$numero->execute([
			"operateur" => $num['key'],
			"numero" =>$value
		]);
	}

	$numeros = $connexion->prepare("SELECT operateur, numero FROM telephone");
	$numeros->execute();

	$numeros = $numeros->fetchAll();

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8"/>
		<title>TELEPHONE</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<h1 class="text-center">EXERCICE 3</h1>
		<p class="text-center text-warning">
			Répertoire téléphonique
		</p>
		<table class="table  table-center">
			<thead class="thead-dark">
				<tr>
					
					
					<th scope="col">Opérateur</th>
					<th scope="col">Numéro de téléphone</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(!empty($_POST)):
					foreach($numeros as $num):
						?>
						<tr>   
							<td><?= $num['operateur'] ?></td>
							<td><?= $num['numero'] ?></td>
						</tr>
						<?php
					endforeach;
				endif;
				?>	
				
			</tbody>
		</table>


		<form method="POST" >
			<label>Téléphone</label><br/>
			<textarea  class="form-control" name="telephone">

			</textarea>
			<input type="submit" class="btn btn-primary" value="Enregistrer">
		</form>
	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</html>