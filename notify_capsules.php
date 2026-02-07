<?php

require_once 'config/database.php';
require_once 'models/Capsule.php';
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$capsules = Capsule::getReadyToNotify();

foreach ($capsules as $capsule) {
    if (!empty($capsule['email'])) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $_ENV['SMTP_HOST']; // SMTP sunucusu
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['SMTP_USER']; 
            $mail->Password   = $_ENV['SMTP_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $_ENV['SMTP_PORT'];

            $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
            $mail->addAddress($capsule['email']);
            $mail->isHTML(true);
            $mail->Subject = '⏳ Kapsülün Açıldı!';
            $mail->Body    = "<h3>Selam!</h3><p>" . nl2br(htmlspecialchars($capsule['message'])) . "</p><hr><p>Bu kapsül " . $capsule['open_date'] . " tarihinde açılmak üzere ayarlanmıştı.</p>";

            $mail->send();
            Capsule::markAsNotified($capsule['id']);
        } catch (Exception $e) {
            error_log("Mail gönderilemedi: {$mail->ErrorInfo}");
        }
    }
}
?>
