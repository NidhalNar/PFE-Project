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

function connectuser($data){

  $conn=connect();
  $email=$data['email'];
  $mdp=md5($data['mdp']);
  $requette="SELECT * FROM user WHERE  email='$email' AND mdp='$mdp' ";
  $resultat= $conn->query($requette);

  $user=$resultat->fetch();

  return $user;



}


function getresemailcong(){
  
  $conn=connect();
  
  $requette="SELECT email FROM user WHERE  (role='Responsable de Conge')";
  $resultat= $conn->query($requette);

  $user=$resultat->fetch();

  if( is_array($user) && count($user) > 0 ){

    $nomz=$user['email'];
  }
  //$nomstr=implode($user);
  //var_dump($nomstr);
  //$nomfinal=$nomstr->nom;
  return $nomz;

}

function getresemailperdiem(){
  
  $conn=connect();
  
  $requette="SELECT email FROM user WHERE  (role='Responsable de Perdiem')";
  $resultat= $conn->query($requette);

  $user=$resultat->fetch();

  if( is_array($user) && count($user) > 0 ){

    $nomz=$user['email'];
  }
  //$nomstr=implode($user);
  //var_dump($nomstr);
  //$nomfinal=$nomstr->nom;
  return $nomz;

}

function getresemaildep(){
  
  $conn=connect();
  
  $requette="SELECT email FROM user WHERE  (role='Responsable de Deplacement')";
  $resultat= $conn->query($requette);

  $user=$resultat->fetch();

  if( is_array($user) && count($user) > 0 ){

    $nomz=$user['email'];
  }
  //$nomstr=implode($user);
  //var_dump($nomstr);
  //$nomfinal=$nomstr->nom;
  return $nomz;

}

function getresemailavance(){
  
  $conn=connect();
  
  $requette="SELECT email FROM user WHERE  (role='Responsable Avance')";
  $resultat= $conn->query($requette);

  $user=$resultat->fetch();

  if( is_array($user) && count($user) > 0 ){

    $nomz=$user['email'];
  }
  //$nomstr=implode($user);
  //var_dump($nomstr);
  //$nomfinal=$nomstr->nom;
  return $nomz;

}













?>