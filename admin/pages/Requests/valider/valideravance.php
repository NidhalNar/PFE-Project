<?php

$idc=$_GET['idavance'];


include"../../acesstest/acesstest.php";
$conn = connect();

$requette="UPDATE avance SET etat='Validée' WHERE id='$idc'";
$resultat=$conn->query($requette);
if($resultat){
    header('location:../avance.php?valideravance=ok');

}
?>