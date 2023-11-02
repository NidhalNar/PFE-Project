<?php

$idc=$_GET['idravance'];


include"../../acesstest/acesstest.php";
$conn = connect();

$requette="UPDATE avance SET etat='Refusée' WHERE id='$idc'";
$resultat=$conn->query($requette);
if($resultat){
    header('location:../list4.php?refuseravance=ok');

}
?>