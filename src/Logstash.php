<?php
// +----------------------------------------------------------------------
// | Logstash.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/6/30 19:59
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------
namespace Wufly;

use Wufly\Logger\LogstashLogger;


class Logstash
{
    protected static $logger;

    public static function __callStatic($funcName, $args)
    {
        if (!self::$logger) {
            self::$logger = new LogstashLogger();
        }
        return (self::$logger)->$funcName(...$args);
    }

    /**
     * @function
     * @param $channel
     * @return string
     */
    public static function channel($channel)
    {
        if (!self::$logger) {
            self::$logger = new LogstashLogger($channel);
        }
        return self::$logger;
    }


}
