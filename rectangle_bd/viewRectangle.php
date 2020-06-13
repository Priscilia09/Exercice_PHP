<?php
    $entityManager=new RectangleManager();

    if( isset($_POST['btn_submit'])){

        if($_POST['btn_submit']==="calcul"){

        $validator=new Validator();

        $longueur=$_POST['longueur'];
        $largeur=$_POST['largeur'];

          $validator->is_empty($longueur,'longueur');
          $validator->is_empty($largeur,'largeur');
         
         if($validator->is_valid()){
            $validator->compare($longueur,$largeur,'longueur','largeur');
            if($validator->is_valid()){
                $rectangle=new Rectangle($largeur);
                $rectangle->setLongueur($longueur);
                $entityManager->create($rectangle);

            }
         }
         $errors=$validator->getErrors();

            if(isset($errors['longueur'])){
                $longueur="";
            }
            if(isset($errors['largeur'])){
                $largeur="";
            }

        }else{
            session_destroy();
        }
    }


 ?>



         <div class="container mt-5">

         <?php if(isset($errors['all'])){
             $largeur="";
             $longueur="";

         ?>
         <div class="alert alert-danger col-4">
             <strong>Erreur</strong> <?php echo $errors['all'];?>
         </div>
        <?php
        }
        ?>
             <form method="post" action="">
                 <div class="form-group row">
                     <label for="inputName" class="col-sm-1-12 col-form-label">Longueur</label>
                     <div class="col-6 ml-2">
                         <input type="text" class="form-control" name="longueur" value="<?=$longueur?>" id="inputName" placeholder="">
                     </div>
            <?php if(isset($errors['longueur'])){


            ?>
                     <div class="alert alert-danger col-4">
                         <strong>Erreur</strong> <?php echo $errors['longueur'];?>
                     </div>
             <?php
            }
            ?>

                 </div>
                 <div class="form-group row">
                     <label for="inputName" class="col-sm-1-12 col-form-label">Largeur</label>
                     <div class="col-6 ml-3">
                         <input type="text" class="form-control" name="largeur" value="<?=$largeur?>" id="inputName" placeholder="">
                     </div>

                     <?php if(isset($errors['largeur'])){

                    ?>
                    <div class="alert alert-danger col-4">
                        <strong>Erreur</strong> <?=$errors['largeur'];?>
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

    $rectangles=$entityManager->findAll();
    var_dump($rectangles);
      if(count($rectangles)>0) {
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
                foreach ($rectangles as $key => $rectangle) {
            ?>
                <tr>
                    <td scope="row"><?=$rectangle->demiPerimetre()?></td>
                    <td><?=$rectangle->perimetre()?></td>
                    <td><?=$rectangle->surface()?></td>
                    <td><?=$rectangle->diagonale()?></td>
                    <td>
                        <a name="" id="" class="btn btn-success col-5" href="#" role="button">Edit</a>
                        <a name="" id="" class="btn btn-danger col-5" href="#" role="button">Delete</a>
                    </td>
                </tr>

                <?php
                }
                ?>

            </tbody>
        </table>

    <?php
       }
 ?>
