<?php

// Declaration variable de message
$message = "";

//Code pour la suppression du stagiaire
if (isset($_POST['supprime']) && !empty($_POST['id'])) {

    
    // Extraction des valeur du post en variable
    extract($_POST);
    
    $q = $db->prepare("DELETE FROM stagiaires WHERE stagiaires . id = '$id'");

       //Execution de la requete
      $q->execute();
  
      $message = "le compte à été supprimer";
  
  }
?>