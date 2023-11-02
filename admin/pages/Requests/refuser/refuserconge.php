<?php

$idc=$_GET['idrconge'];


include"../../acesstest/acesstest.php";
$conn = connect();

$requette="UPDATE conge SET etat='Refusée' WHERE id='$idc'";
$resultat=$conn->query($requette);
if($resultat){
    header('location:../conge.php?refuserconge=ok');

}
?>