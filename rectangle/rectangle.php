<!--

    1) Saisir la longueur et la largeur d'un rectangle à partir d'un formulaire
        Longueur et Largeur doivent être numériques (entier, réel)
        Longueur positif
        Largeur positif
        Longueur > Largeur

    2) Traitements -> U.C:
        _Calculer le demi-perimetre Dp
        _Calculer le perimetre p
        _Calculer la surface s
        _Calculer le diagonale

    Premiere heure
    1- Afficher les erreurs
    2- Garder les bonnes valeurs et effacer les mauvaises
    3- Session => $_SESSION
        Ouvrir une session avec session_start()
        Fermer la session avec session_destroy()
        $_SESSION est un tableau associatif

    Deuxieme heure
    POO en PHP
        1- Classe (Concrete ou abstraite ou interface)
            a) Attribut(Instance ou classe)
            b) Attribut(Instance ou classe)
        2- Objet

        Nomination
        Classe => MaClasse
        Methode => maMethode
        Attribut => monattribut
-->

<?php

require_once("validation.php");
require_once("rectangleController.php");
define('BTN_SUBMIT', 'btn_submit');
define('LARGEUR', 'largeur');
define('LONGUEUR', 'longueur');

$errors = [];
$resultat = [];
$longueur = "";
$largeur = "";

//Ouvrir une session avec session_start()
session_start();
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = 0;
}

if (isset($_POST[BTN_SUBMIT])) {

    if(($_POST[BTN_SUBMIT]) ==="calcul"){

        $longueur = $_POST['longueur'];
        $largeur = $_POST['largeur'];

        $result = is_empty($longueur);
        if ($result !== true) {
            $errors[LONGUEUR] = $result;
            $longueur = "";
        }

        $result = is_empty($largeur);
        if ($result !== true) {
            $errors[LARGEUR] = $result;
            $largeur = "";
        }

        if (count($errors) == 0) {
            $result = compare($longueur, $largeur);
            if ($result === true) {
                $resultat["demi_perimetre"] = demi_perimetre($longueur, $largeur);
                $resultat["perimetre"] = perimetre($longueur, $largeur);
                $resultat["surface"] = surface($longueur, $largeur);
                $resultat["diagonale"] = diagonale($longueur, $largeur);
                $id = $_SESSION['id'];
                $id++;
                $_SESSION['Resultat' . $id] = $resultat;
                $_SESSION['id'] = $id;
            } else {
                $errors = $result;
            }
        }


        if (isset($errors[LONGUEUR])) {
            $longueur = "";
        }
        if (isset($errors[LARGEUR])) {
            $largeur = "";
        }

    } else {
        session_destroy();
    }


}



?>



<!doctype html>
<html lang="en">

<head>
    <title>Rectangle</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <form method="post" action="">
            <?php
            if (isset($errors['all'])) {
                $longueur = "";
                $largeur = "";
            ?>

                <div class="alert alert-danger col-6" role="alert">
                    <strong>Erreur</strong> <?php echo $errors['all']; ?>
                </div>
            <?php
            }
            ?>

            <div class="form-group row">
                <label for="inputName" class="col-sm-1-12 col-form-label">Longueur</label>
                <div class="col-4 ml-3">
                    <input type="text" class="form-control" value='<?= $longueur ?>' name="longueur" id="inputName" placeholder="">
                </div>
                <?php
                if (isset($errors[LONGUEUR])) {

                ?>
                    <div class="alert alert-danger col-6" role="alert">
                        <strong>Erreur</strong> <?php echo $errors[LONGUEUR]; ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-1-12 col-form-label">Largeur</label>
                <div class="col-4 ml-4">
                    <input type="text" class="form-control" value='<?= $largeur ?>' name="largeur" id="inputName" placeholder="">

                </div>
                <?php
                if (isset($errors[LARGEUR])) {

                ?>
                    <div class="alert alert-danger col-6" role="alert">
                        <strong>Erreur</strong> <?php echo $errors[LARGEUR]; ?>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-2">
                    <button type="submit" name="btn_submit" value="calcul" class="btn btn-primary">Calculer</button>
                </div>
                <div class="offset-sm-2 col-sm-2">
                    <button type="submit" name="btn_submit" value="reinitialisation" class="btn btn-secondary">Réinitialiser</button>
                </div>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST[BTN_SUBMIT]) && $_POST[BTN_SUBMIT] ==="calcul" && count($errors) === 0) {

    ?>
        
        <table class="table table-bordered container">
            <thead>
                <tr>
                    <th>Demi-Perimetre</th>
                    <th>Perimetre</th>
                    <th>Surface</th>
                    <th>Diagonale</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
                foreach ($_SESSION as $resultat) {
                    var_dump($resultat);
                    
            ?>

                <tr>
                    <td scope="row"><?=$resultat["demi_perimetre"]; ?></td>
                    <td><?=$resultat["perimetre"]; ?></td>
                    <td><?=$resultat["surface"]; ?></td>
                    <td><?=$resultat["diagonale"]; ?></td>
                </tr>

            <?php 
                }
            ?>

            </tbody>
        </table>

    <?php
    }
    ?>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>