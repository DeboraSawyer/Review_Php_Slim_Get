<?php

namespace App\SystemServices;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MonologFactory {
    private static $logger;

    public static function getLogger() {
        if (self::$logger === null) {
            self::$logger = new Logger("Meu App");
            self::$logger->pushHandler(new StreamHandler("meuslogs.log", Level::Error));
            return self::$logger;
        } else {
            return self::$logger;
        }
    }

}

?>