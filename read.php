<?php 
// Recuperation des stagiaires depuis la base de donnéé par ordre de nom

$q = $db->prepare("SELECT * FROM stagiaires ORDER BY nom");

//execution de la requete
$q->execute();

//Declaration des variable listes et nombre
$listes = null;
$i = 0;
//Traitement du résultat
while($liste = $q->fetch()){
    $listes[] = $liste;
}

//Boutton retour
if(isset($_GET['accueil'])){
  header('Location: create.php');
  exit();
}
?>

<div class="">
<br>
<div class="text-center">
 <a href="?accueil" class="btn btn-outline-dark rounded-pill"><boutton>Retour vers la page d'accueil</boutton></a>
</div><br>
<div class="card-deck">
                <div class="card  shadow-sm">
                  <div class="card-header">
                    <h4 class="font-weight"><span class="fa fa-bell"></span> LISTE DES STAGIAIRES INSCRITS</h4>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">N°</th>
                          <th scope="col">PHOTO</th>
                          <th scope="col">NOM</th>
                          <th scope="col">PERNOM</th>
                          <th scope="col">EMAIL</th>
                          <th scope="col">DATE DEBUT</th>
                          <th scope="col">DATE FIN</th>
                          <th scope="col">COMMENTAIRE</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                    
                      <tbody>
                        <!-- Verification si la variable listes est vri -->
                        <?php if($listes) :?>
                           <!-- Condition pour le message -->
                          <?php if($message) : ?>
                          <div class="alert alert-success text-center">
                              <?= $message?>
                          </div>
                          <?php endif ?>
                            <!-- Boucle pour le remplissage automatique du tableau -->
                      <?php foreach($listes as $stagiaire):?>
                        <!-- Incrementation de la variable $i -->
                        <?php $i++ ?>
                        <tr>
                          <th ><?= $i ?></th>
                          <td ><img src="image/<?= $stagiaire['photo'] ?>" class="image" alt="Responsive image"></a></td>
                          <td ><?= $stagiaire['nom'] ?></a></td>
                          <td ><?= $stagiaire['prenom'] ?></td>
                          <td ><?= $stagiaire['email'] ?></th>
                          <td ><?= $stagiaire['date_debut'] ?></td>
                           <td ><?= $stagiaire['date_fin'] ?></td>
                          <td ><?= $stagiaire['commentaire'] ?></td>
                          <td ><a href="?update=<?= $stagiaire['id'] ?>" class="btn btn-outline-info">Modifier</a>
                          <form method="POST" action="">
                            <input type="hidden" name="id" value="<?= $stagiaire['id'] ?>">
                            <hr>
                            <button type="submit" class="btn btn-outline-danger" name="supprime">Supprimer</button>
                          </form></td>
                          
                       </tr>
                       <?php endforeach ?>
                       <?php endif ?>
                    </tbody>
                      
                    </table>
                </div>
            </div>

          </div>
</div>