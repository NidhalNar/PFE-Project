<?php

$idc=$_GET['idrdeplacement'];


include"../../acesstest/acesstest.php";
$conn = connect();

$requette="UPDATE deplacement SET etat='Refusée' WHERE id='$idc'";
$resultat=$conn->query($requette);
if($resultat){
    header('location:../list3.php?refuserdeplacement=ok');

}
?>