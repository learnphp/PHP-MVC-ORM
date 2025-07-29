<?php
namespace app\services;

use app\interfaces\MailerInterface;

class EmailMailer implements MailerInterface {
    public function send($message) {
        echo "Sending email: $message\n";
    }
}
