<?php


namespace App\Helper;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger as Monolog;

/**
 * Class Logger
 * @method static info(string $message, array $data = [])
 * @method static error(string $message, array $data = [])
 * @method static debug(string $message, array $data = [])
 * @package App\Helper
 */
class Logger
{
    /**
     * @param $method
     * @param $arguments
     * @return Monolog
     */
    public static function __callStatic($method, $arguments) {
        $arguments[1] = $arguments[1] ?? [];
        return (new Monolog('local'))
            ->pushHandler(new RotatingFileHandler(storage_path("logs/web.log")))
            ->$method(date('Y-m-d H:i:s').$arguments[0], $arguments[1]);
    }
}
