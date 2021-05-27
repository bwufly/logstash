<?php
/**
 * Created by PhpStorm.
 * User: wufly
 * Date: 2020/6/30 23:17
 */

return [
    /**
     * |--------------------------------------------------------------------------
     * | Logging Configuration
     * |--------------------------------------------------------------------------
     * |
     * | Here you may configure the log settings for your application. Out of
     * | the box, Laravel uses the Monolog PHP logging library. This gives
     * | you a variety of powerful log handlers / formatters to utilize.
     * |
     * | Available Settings: "single", "daily", "syslog", "errorlog"
     * |
     */
    'log'                 => env('APP_LOG', 'daily'),

    /**
     * 日志位置,可以自己指定
     */
    'log_path'            => env('LOG_PATH', $app->storagePath() . '/logs'),

    /**
     * 日志文件名称
     */
    'log_name'            => env('LOG_NAME', 'laravel-' . Carbon\Carbon::today()),

    /**
     * 日志文件最大数
     */
    'log_max_files'       => '90',

    /**
     * log permission
     */
    'log_file_permission' => env('LOG_FILE_PERMISSION'),

    /**
     * logstash log path
     */
    'logstash_log_path'   => env('LOGSTASH_LOG_PATH', $app->storagePath() . '/logs/logstash.log'),
    'logstash_days'       => env('LOGSTASH_DAYS', 14),

    'request_id_name' => env('REQUEST_ID_NAME', 'request-id'),
];
