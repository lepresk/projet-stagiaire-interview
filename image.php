<?php
//Code pour le téléchargement de l'image
$maxSize = 100000;
$extentionValide = array('.jpg', '.png', '.jpeg', '.png');
if($_FILES['image']['error'] > 0){
    $imagStage="";
}

$fileSize = $_FILES['image']['size'];

$fileName = $_FILES['image']['name'];
$extionFile = "." .strtolower(substr(strrchr($fileName, '.'), 1));

if(!in_array($extionFile, $extentionValide))
{
    $imagStage="";
}
else{
    $tmpName = $_FILES['image']['tmp_name'];
    $uniqueName = md5(uniqid(rand(), true));
    $fileName = "image/". $uniqueName . $extionFile;
    $resultat = move_uploaded_file($tmpName, $fileName);
    
    $imagStage = $uniqueName . $extionFile;

    
}
?>