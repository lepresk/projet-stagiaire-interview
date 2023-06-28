<?php 
// Inclusion du code de connexion à la base de donnée
require 'database.php';
global $db;

//variable de l'image
$imagStage = null;

// Inclusion du code de l'image
if(isset($_FILES['image'])){
    include 'image.php';
  }

// Inclusion du code html  header
require 'head/header.php';

  //Inclusion du code delete.php
require 'delete.php';

    //Inclusion du code read.php 
    if(isset($_GET["read"])){
        require 'read.php';
    }
       
    //Inclusion du code update.php
    else if(isset($_GET["update"])){
        require 'update.php';
    }

    //Inclusion du code create.php  
    else{
    require 'create.php';
    }








//Inclusion du code html footer
require 'foot/footer.php';