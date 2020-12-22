<?php
       // from the form
       $name = trim(strip_tags($_POST['name']));
       $phone = trim(strip_tags($_POST['phone']));
       $email = trim(strip_tags($_POST['email']));
       $message = htmlentities($_POST['message']);


 $email;$phone;$message;$captcha;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['message'])){
          $message=$_POST['message'];
        }if(isset($_POST['phone'])){
          $phone=$_POST['phone'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6LcagOoUAAAAAI6PLQBD8TETNejk6ealcb6-mJLN";
        $ip = $_SERVER['REMOTE_ADDR'];




       // Send email
       $subject = "Contact from flaresoftware.com";
       $to = 'clayton@flaresoftware.com';

       $body = "<html>
       <style>
       h4 {color:#555555;}
       </style>

       <h2>Contact from flaresoftware.com</h2>
       <br>
       <tr><td><h4>Client name: </h4><h3>".$name."</h3></td></tr>
       <tr><td><h4>Phone number: </h4><h3>".$phone."</h3></td></tr>
       <tr><td><h4>Email address: </h4><h3>".$email."</h3></td></tr>
       <tr><td><h4>Message: </h4><h3>".$message."</h3></td></tr>
       </html>";

       $headers = "From: New-Lead-from-Website\r\n";
       $headers .= "Content-type: text/html\r\n";




$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You are spammer! Get the @$%K out mofo, before I bust a cap!</h2>';
        } else {
            mail($to, $subject, $body, $headers);
            header('Location: http://flaresoftware.com/public/submitted-form.html');
        }


?>
