<?php


$iduser=$_GET['iduser'];

include"../../acesstest/acesstest.php";
$conn = connect();

$requette="DELETE FROM user WHERE id='$iduser'";

$resultat=$conn->query($requette);

if ($resultat){

    header('location:../List.php?delete=ok');
}









?>