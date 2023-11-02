<?php

$idc=$_GET['idrperdiem'];


include"../../acesstest/acesstest.php";
$conn = connect();

$requette="UPDATE perdiem SET etat='Refusée' WHERE id='$idc'";
$resultat=$conn->query($requette);
if($resultat){
    header('location:../perdiem.php?refuserperdiem=ok');

}
?>