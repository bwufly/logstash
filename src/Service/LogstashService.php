<?php
// +----------------------------------------------------------------------
// | LogstashService.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/1 17:43
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\Service;

use Monolog\Formatter\LogstashFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;


class LogstashService
{
    public function __invoke(array $config): LoggerInterface
    {
        $handler = new RotatingFileHandler(
            config('logstash.logstash_log_path'),
            config('logstash.logstash_days') ?? 14,
            Logger::DEBUG,
            true,
            config('logstash.log_file_permission', null)
        );
        $appName = config('app.name');
        $handler->setFormatter(new LogstashFormatter($appName));
        return new Logger($appName, [$handler]);
    }

}
