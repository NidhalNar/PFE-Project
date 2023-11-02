<?php


function connect() { 
$servername = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname="PFE";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpass);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
 // echo "Connection failed: " . $e->getMessage();
}
return $conn;
}

function connectadmin($data){

  $conn=connect();
  $email=$data['email'];
  $mdp=$data['mdp'];
  $requette="SELECT * FROM administrateur WHERE  email='$email' AND mdp='$mdp' ";
  $resultat= $conn->query($requette);

  $admin=$resultat->fetch();

  return $admin;



}











?>