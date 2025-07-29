<?php
namespace app\services;

use app\interfaces\LoggerInterface;

class FileLogger implements LoggerInterface {
    public function log($message) {
        echo "Log: $message\n";
    }
}
