# logstash
Log formatting to facilitate logstash collection

### 安装包
composer require wufly/logstash

### 自动发现
composer dump-autoload 

### 生成配置文件
 php artisan vendor:publish --provider="Wufly\Provider\LogstashServiceProvider"

### 更改日志配置文件
'logstash' => [
    'driver' => 'custom',
    'via'    => \Wufly\Service\LogstashService::class,
    'path'   => storage_path('logs/logstash/logstash.log'),
],
 .env配置 LOG_CHANNEL=logstash      
