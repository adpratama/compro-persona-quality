<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'third_party/PHPMailer/src/Exception.php';
require APPPATH . 'third_party/PHPMailer/src/PHPMailer.php';
require APPPATH . 'third_party/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Phpmailer_lib
{

    private $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer(TRUE);
        log_message('debug', 'PHPMailer class is loaded.');
    }

    public function sendMail($from, $subject, $message)
    {
        $mail = new PHPMailer(TRUE);

        try {
            // Server settings
            $to = 'admin@personaquality.co.id';

            $mail->isSMTP();
            $mail->Host       = 'mail.personaquality.co.id';  // Ganti dengan host SMTP Anda
            $mail->SMTPAuth   = true;
            $mail->Username   = '_mainaccount@personaquality.co.id';    // Ganti dengan username SMTP Anda
            $mail->Password   = 'PQcoid2023##';    // Ganti dengan password SMTP Anda
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Ganti dengan PHPMailer::ENCRYPTION_SMTPS jika menggunakan SSL
            $mail->Port       = 587;  // Sesuaikan dengan port SMTP Anda

            // Recipients
            $mail->setFrom('admin@personaquality.co.id', $from);  // Ganti dengan alamat email dan nama pengirim Anda
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            log_message('debug', 'Email has been sent.');
            return true;
        } catch (Exception $e) {
            log_message('error', 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo);
            return false;
        }
    }

    public function getError()
    {
        return $this->mail->ErrorInfo;
    }
}
