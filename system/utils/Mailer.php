<?php

    require_once $_SERVER["DOCUMENT_ROOT"].'/system/lib/phpmailer/class.phpmailer.php';
    require_once $_SERVER["DOCUMENT_ROOT"].'/system/lib/phpmailer/class.smtp.php';

    class Mailer{

        private $mailer;

        function __construct(){
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Username = "portal.comunicaciones.noreply@gmail.com";
            $mail->Password = "sabor123";
            $this->mailer = $mail;
        }

        function setFrom($from){
            $this->mailer->SetFrom($from);
        }

        function setAddress($address, $name = ''){
            $this->mailer->addAddress($address, $name);
        }

        function setBody($body){
            $this->mailer->Body = $body;
        }

        function setSubject($subject){
            $this->mailer->Subject = $subject;
        }

        function sendEmail(){
            if ($this->mailer->send()){
                return true;
            } else {
                print_r('Mailer Error: ' . $this->mailer->ErrorInfo);
                return false;
            }
        }

    }


 ?>
