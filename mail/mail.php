<?php

  require("PHPMailer-master/src/PHPMailer.php");
  require("PHPMailer-master/src/SMTP.php");

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
    $mail->Subject = "Test";
    $mail->Body = '<table class="table" cellspacing="0">
    <thead>
      <tr>
          <th colspan="2">Enquery Mail from erstdyfgu</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          <td colspan="2">'. '<p>Dear Sir / Madam, I have some enqueries as follows :</p></br>' .'</td>
      </tr>
      <tr>
          <td>Email:</td>
          <td>ff</td>
      </tr>
      <tr>
          <td>Phone No:</td>
          <td>hjkvbn</td>
      </tr>
      <tr>
          <td>City:</td>
          <td>ljkh,bvn</td>
      </tr>
      <tr>
          <td>Message:</td>
          <td>gjkhgvn</td>
      </tr>
      <tr>
          <td>Date of Enquery:</td>
          <td>ukgyjfhg</td>
      </tr>
    </tbody>
    </table>';
        $mail->AddAddress("ennarnidhal@gmail.com");

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
?>