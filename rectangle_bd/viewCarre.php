<?php

$entityManager = new CarreManager();

if (isset($_POST['btn_submit'])) {

    if ($_POST['btn_submit'] === "calcul") {

        $validator = new Validator();

        $longueur = $_POST['longueur'];

        $validator->is_empty($longueur, 'longueur');
        if ($validator->is_valid()) {
            $validator->is_positif($longueur, 'longueur');
            if ($validator->is_valid()) {
                $carre = new Carre();
                $carre->setLongueur($longueur);
                $entityManager->create($carre);
            }
        }
        $errors = $validator->getErrors();

        if (isset($errors['longueur'])) {
            $longueur = "";
        }
    } else {
        session_destroy();
    }
}


?>



<div class="container mt-5">


    <form method="post" action="">
        <div class="form-group row">
            <label for="inputName" class="col-sm-1-12 col-form-label">Longueur</label>
            <div class="col-6 ml-2">
                <input type="text" class="form-control" name="longueur" value="<?= $longueur ?>" id="inputName" placeholder="">
            </div>
            <?php if (isset($errors['longueur'])) {


            ?>
                <div class="alert alert-danger col-4">
                    <strong>Erreur</strong> <?php echo $errors['longueur']; ?>
                </div>
            <?php
            }
            ?>

        </div>


        <div class="form-group row">
            <div class="offset-sm-2 col-sm-2">
                <button type="submit" name="btn_submit" value="calcul" class="btn btn-primary">Calculer</button>
            </div>
            <div class="col-sm-2">
                <button type="submit" name="btn_submit" value="reinitialisation" class="btn btn-secondary">Reinitialiser</button>
            </div>
        </div>
    </form>
</div>
<?php
$carres = $entityManager->findAll();
if (count($carres) > 0) {
?>
    <table class="table container table-bordered">
        <thead>
            <tr>
                <th>Demi-Perimetre</th>
                <th>Perimetre</th>
                <th>Surface</th>
                <th>Diagonale</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $_SESSION['counter'] = 0;
            $counter = $_SESSION['counter'];
            $counters = [];
            foreach ($carres as $key => $carre) {
                $counters['id' . $counter] = $carre->getId();
            ?>
                <tr>
                    <td scope="row"><?= $carre->demiPerimetre() ?></td>
                    <td><?= $carre->perimetre() ?></td>
                    <td><?= $carre->surface() ?></td>
                    <td><?= $carre->diagonale() ?></td>
                    <td>
                        <button type="button" class="btn btn-success col-5 m-auto">
                            Edit
                        </button>
                        <button type="button" id="<?= $counters['id' . $counter] ?>" class="btn btn-danger col-5 m-auto" data-toggle="modal" data-target="#deleteModal">
                            Delete
                        </button>
                    </td>
                </tr>


            <?php
                $counter++;
            }
            var_dump($counters);
            var_dump($_POST);
            $i = 0;
            while($i<count($counters)){

            
            ?>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation de la supression</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="w-100 text-center">Voulez-vous vraiment supprimer cet objet ?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="" method="post">
                                <button type="submit" class="btn btn-danger" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-success" name="itemToDelete" value="<?= $counters['id' . $i] ?>">Yes</button>
                            </form>
                            <?php
                            if (isset($_POST['itemToDelete'])) {
                                echo '<br /><br />'.$counters['id' . $i];
                                if ($_POST['itemToDelete'] === $counters['id' . $i]) {
                                    $answer = $entityManager->delete($counter);
                                    echo $answer;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $i++;
            }
            var_dump($_POST);
            ?>
        </tbody>
    </table>

<?php
}
?>