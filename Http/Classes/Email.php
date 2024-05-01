<?php

namespace Http\Classes;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


const PASSWORDAPP = "thug vsts aagx ukel";
const EMAILFROM = "noreply@lucaserafini.it";
const EMAILNAME = "Luca Serafini";

class Email
{
    protected $mail;
    public function __construct(){
        $this->mail = new PHPMailer(true);         //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = 'noreply.lucaserafini@gmail.com';                     //SMTP username
        $this->mail->Password   = PASSWORDAPP;                               //SMTP password
        $this->mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    }

    public function send($to, $name, $subject, $body): bool
    {
        try {
            $this->mail->setFrom(EMAILFROM, EMAILNAME);
            $this->mail->addAddress($to, $name);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->send();
        }catch (Exception $e){
            return false;
        }
        return true;
    }


}