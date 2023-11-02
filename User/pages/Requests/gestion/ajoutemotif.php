<?php


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


    $code=generateRandomString();
    $libelle =$_POST['libelle'];
   
    
   

include"../../acesstest/acesstest.php";
$conn = connect();


$requette="INSERT INTO motif (code,libelle) VALUES ('$code','$libelle')" ;

$resultat = $conn->query($requette);

if ($resultat) {
    header('location:../conge.php?ajoutemotif=ok');

}







?>