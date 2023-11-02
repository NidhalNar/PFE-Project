<?php

$idc=$_GET['idconge'];


include"../../acesstest/acesstest.php";
$conn = connect();

$requette="UPDATE conge SET etat='Validée' WHERE id='$idc'";
$resultat=$conn->query($requette);
if($resultat){
    header('location:../conge.php?validerconge=ok');

}
?>