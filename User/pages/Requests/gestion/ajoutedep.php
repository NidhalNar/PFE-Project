<?php
session_start();


    $nom =$_SESSION['nom'];
    $prenom =$_SESSION['prenom'];
    $email =$_SESSION['email'];
    $date =$_POST['date'];
    $montant =$_POST['montant'];
    $client =$_POST['client'];
    $projet =$_POST['projet'];
   
    $etat="Saisie";
    
   

include"../../acesstest/acesstest.php";
$conn = connect();
$responsable=getresemaildep();


$requette="INSERT INTO deplacement (nom,prenom,email,date,montant,client,projet,responsable,etat) VALUES 
                    ('$nom','$prenom','$email','$date','$montant','$client','$projet','$responsable','$etat')" ;

$resultat = $conn->query($requette);

if ($resultat) {
    
    require("../../../../mail2/PHPMailer-master/src/PHPMailer.php");
    require("../../../../mail2/PHPMailer-master/src/SMTP.php");
  
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->IsSMTP(); // enable SMTP
  
      //$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true; // authentication enabled
      $mail->SMTPSecure = true; // secure transfer enabled REQUIRED for Gmail
      $mail->Host = "ssl0.ovh.net";
      $mail->Port = 587; // or 587
      $mail->IsHTML(true);
      $mail->Username = "henkel@mobileteams.online";
      $mail->Password = "785991L@M";
  
      
    
      $mail->SetFrom("henkel@mobileteams.online");
      $mail->Subject = "Une nouvelle Demande est soumise";
      $mail->Body = '<h4>Connectez-vous à votre compte pour voir la nouvelle demande.</h4>';
          $mail->AddAddress($responsable);
  
       if(!$mail->Send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
       } else {
          //echo "Message has been sent";
          header('location:../deplacement.php?ajoutedep=ok');
       }
   // header('location:../deplacement.php?ajoutedep=ok');

}







?>