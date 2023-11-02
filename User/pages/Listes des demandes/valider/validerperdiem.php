<?php

$idc=$_GET['idperdiem'];


include"../../acesstest/acesstest.php";
$conn = connect();

$requette="UPDATE perdiem SET etat='Validée' WHERE id='$idc'";
$resultat=$conn->query($requette);
if($resultat){
    header('location:../list2.php?validerperdiem=ok');

}
?>