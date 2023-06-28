<?php 

$message = null;
$erreur = null;
//Recuperation de l'id à modifier
$id = $_GET['update'];
// Recuperation du stagiaire à modifier depuis la base de donnéé par ordre de nom

$q = $db->prepare("SELECT * FROM stagiaires WHERE id = '$id'  ");

//execution de la requete
$q->execute();

//Declaration de la variable $stagiere 
$stagiere = null;

//Traitement du résultat
while($liste = $q->fetch()){
    $stagiere = $liste;
}


/////////////////////////////
//Code pour le traitement du formulaire
if(isset($_POST['modifie'])){
    //Verification si les champs ne sont pas vides
    if(!empty($_POST["nom"] && $_POST["prenom"] && $_POST["email"] && $_POST["date_debut"] && $_POST["date_fin"] && $_POST["id"])){

   

        // Extraction des valeur du post en variable
        extract($_POST);
        $comment = addslashes($comment);
        //Preparation de la requete SQL
        $q = $db->prepare("UPDATE stagiaires SET  nom = '$nom', prenom = '$prenom', email =  '$email',
         date_debut = '$date_debut' ,date_fin = '$date_fin' ,commentaire = '$comment' WHERE id = '$id' ");


         //Execution de la requete
         $q->execute([]);
         
        //verification et mise à jour de l'image
        if(!empty($imagStage)){
        //Preparation de la requete SQL
        $q = $db->prepare("UPDATE stagiaires SET  photo = '$imagStage' WHERE id = '$id' ");


        //Execution de la requete
        $q->execute([]);
        }

         //Message 
         $message = "Votre compte à été bien Mis à jour";
        }else{
            //Erreur
            $erreur = "Veuillez remplir les champs important";
        }

}

//Boutton retour
if(isset($_GET['accueil'])){
    header('Location: create.php');
    exit();
  }

?>




<div class="container">
    <br>
<div class="text-center">
 <a href="?accueil" class="btn btn-outline-dark rounded-pill"><boutton>Retour vers la page d'accueil</boutton></a>
</div><br>
        <!-- Condition pour le message -->
        <?php if($message) : ?>
        <div class="alert alert-success text-center">
            <?= $message?>
        </div>
        <?php endif ?>

        <div class="block_1">
                    <div class="Inscription">
                        <p class="text-option text-center">Modifier le compte</p>
                        <!-- Condition pour l'erreur' -->
                        <?php if($erreur) : ?>
                        <div class="alert alert-danger text-center">
                            <?= $erreur?>
                        </div>
                        <?php endif ?>
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="text" name="nom" class="form-control" value="<?=$stagiere['nom']?>"  placeholder="Nom" >
                            </div>

                            <div class="form-group">
                                <input type="text" name="prenom" class="form-control" value="<?=$stagiere['prenom']?>" required placeholder="Prénom">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control" value="<?=$stagiere['email']?>" required placeholder="Exemple@gamail.com">
                            </div>

                            <div class="form-group">
                                <label for="image">Photo</label>
                                <input type="file" name="image" value="<?=$stagiere['photo']?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="date_debut">Date début</label>
                                <input type="date" name="date_debut" value="<?=$stagiere['date_debut']?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="date_fin">Date fin</label>
                                <input type="date" name="date_fin" class="form-control" value="<?=$stagiere['date_fin']?>" required>
                            </div>

                            <div class="form-group">
                                <textarea name="comment" id=""  class="form-control"  placeholder="Commentaire"><?=$stagiere['commentaire']?></textarea>
                                
                            </div>

                            <!-- ID à modifier -->
                            <input type="hidden" name="id" value="<?=$stagiere['id']?>">

                            <div class="submit text-center">
                            <button type="submit" name="modifie" class="btn btn-outline-info text-center rounded-pill">Modifier le compte</button>
                        </div>
                        </form>
                </div>
            </div>
        <br>
    </div>