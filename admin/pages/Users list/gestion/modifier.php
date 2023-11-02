<?php

 
  //  if (isset ($_POST['nom']) || isset ($_POST['prenom'] )|| isset ($_POST['email'] )  || isset ($_POST['date'] ) 
  //       || isset ($_POST['mobile'] ) || isset ($_POST['fax'] )|| isset ($_POST['role'] ) ) {

  //   if (isset ($_POST['nom']) || isset ($_POST['prenom'] )|| isset ($_POST['email'] )  || isset ($_POST['date'] ) 
  //   || isset ($_POST['mobile'] ) || isset ($_POST['fax'] )|| isset ($_POST['role'] ) ) {
    $id=$_POST['idemp'];
    $nom =$_POST['nom'];
    $prenom =$_POST['prenom'];
    $email =$_POST['email'];
    //$date =$_POST['date'];
    $mobile =$_POST['mobile'];
    //$fax =$_POST['fax'];
    $role =$_POST['role'];
   

include"../../acesstest/acesstest.php";
$conn = connect();


$requette="UPDATE  user SET nom='$nom',prenom='$prenom',email='$email',mobile='$mobile',role='$role'
            WHERE id='$id' ";

$resultat = $conn->query($requette);

if ($resultat) {
    header('location:../List.php?modif=ok');

}
  //   }
  // }






?>