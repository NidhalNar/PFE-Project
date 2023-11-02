<?php

 
  //  if (isset ($_POST['nom']) || isset ($_POST['prenom'] )|| isset ($_POST['email'] )  || isset ($_POST['date'] ) 
  //       || isset ($_POST['mobile'] ) || isset ($_POST['fax'] )|| isset ($_POST['role'] ) ) {

  //   if (isset ($_POST['nom']) || isset ($_POST['prenom'] )|| isset ($_POST['email'] )  || isset ($_POST['date'] ) 
  //   || isset ($_POST['mobile'] ) || isset ($_POST['fax'] )|| isset ($_POST['role'] ) ) {
    
    $nom =$_POST['nom'];
    $prenom =$_POST['prenom'];
    $email =$_POST['email'];
    $date =$_POST['date'];
    $mobile =$_POST['mobile'];
    $fax =$_POST['fax'];
    $role =$_POST['role'];
    $mdp =md5($_POST['mdp']);
   

include"../../acesstest/acesstest.php";
$conn = connect();


$requette="INSERT INTO user (nom,prenom,email,date,mobile,fax,role,mdp) VALUES ('$nom','$prenom','$email','$date','$mobile','$fax','$role','$mdp')" ;

$resultat = $conn->query($requette);

if ($resultat) {
    header('location:../List.php?ajout=ok');

}
  //   }
  // }






?>