<?php

$idc=$_GET['iddeplacement'];


include"../../acesstest/acesstest.php";
$conn = connect();

$requette="UPDATE deplacement SET etat='Validée' WHERE id='$idc'";
$resultat=$conn->query($requette);
if($resultat){
    header('location:../list3.php?validerdeplacement=ok');

}
?>