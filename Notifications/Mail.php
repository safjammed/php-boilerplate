<?php
namespace Notifications;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail
{
    protected $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = (getenv("APP_STATE") != "development" ) ? SMTP::DEBUG_OFF : SMTP::DEBUG_SERVER;
        //Set the hostname of the mail server
        $this->mail->Host = getenv("EMAIL_HOST");
        $this->mail->Port = getenv("EMAIL_PORT");
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = getenv("EMAIL_USERNAME");
        $this->mail->Password = getenv("EMAIL_PASSWORD");
    }    
}