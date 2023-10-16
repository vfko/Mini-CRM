<?php

use PHPMailer\PHPMailer\PHPMailer;

abstract class PersonalistikaMailHelpe {

    public function __construct() {
    }

    static function sendDocument(string $to, string $document_name, string|int $employee_id) {
        $path = $_SERVER['DOCUMENT_ROOT'].'/files/documents/'.$employee_id.'/'.$document_name;

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->CharSet    = 'UTF-8'; // Send using SMTP
        $mail->Host       = 'mailadmin.agentes-it.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'no-reply@agentes-it.cloud';                     // SMTP username
        $mail->Password   = 'Agentes789!';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;

        $mail->setFrom('no-reply@agentes-it.cloud', 'Dokument');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = 'Somnia bona - dokument';
        $mail->Body = 'V příloze Vám zasíláme dokument.';
        $mail->addAttachment($path);
        return $mail->send();

    }
}