<?php 
// Declaration variable de message et d'erreur
$message = "";
$erreur = "";
//Traitement du formulair d'inscription
if(isset($_POST['inscrir'])){
    //Verification si les champs ne sont pas vides
    if(!empty($_POST["nom"] && $_POST["prenom"] && $_POST["email"] && $_POST["date_debut"] && $_POST["date_fin"])){

   

        // Extraction des valeur du post en variable
        extract($_POST);

        //Preparation de la requete SQL
        $q = $db->prepare("INSERT INTO stagiaires (nom,prenom,email,photo,date_debut,date_fin,commentaire)
         VALUES (:nom,:prenom,:email,:photo,:date_debut,:date_fin,:commentaire)");

         //Execution de la requete
         $q->execute([
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "photo" => $imagStage,
            "date_debut" => $date_debut,
            "date_fin" => $date_fin,
            "commentaire" => $comment

         ]);
         
         //Message 
         $message = "Votre compte à été bien enregisté";
        }else{
            //Erreur
            $erreur = "Veuillez remplir les champs important";
        }

}
?>


<div class="container">
        <h1>Gestion de stagiaires</h1>

        <!-- Condition pour le message -->
        <?php if($message) : ?>
        <div class="alert alert-success text-center">
            <?= $message?>
        </div>
        <?php endif ?>

        <div class="block_1">
            <div class="row ">
                <div class="col-md-6">
                    <div class="option">
                        <p class="text-option">Heureux de vous revoir</p>
                        <p class="text-option_2">Que voulez-vous faire ?</p>
                <a href="?read"><button class="btn btn-outline-light rounded-pill">Voir la liste</button></a>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="Inscription">
                        <p class="text-option text-center">Créer un compte</p>
                        <!-- Condition pour l'erreur' -->
                        <?php if($erreur) : ?>
                        <div class="alert alert-danger text-center">
                            <?= $erreur?>
                        </div>
                        <?php endif ?>
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="text" name="nom" class="form-control"  placeholder="Nom">
                            </div>

                            <div class="form-group">
                                <input type="text" name="prenom" class="form-control" required placeholder="Prénom">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required placeholder="Exemple@gamail.com">
                            </div>

                            <div class="form-group">
                                <label for="image">Photo</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="date_debut">Date début</label>
                                <input type="date" name="date_debut" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="date_fin">Date fin</label>
                                <input type="date" name="date_fin" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <textarea name="comment" id=""  class="form-control" placeholder="Commentaire"></textarea>
                                
                            </div>
                            <div class="submit text-center">
                            <button type="submit" name="inscrir" class="btn btn-outline-info text-center rounded-pill">Créer le compte</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>