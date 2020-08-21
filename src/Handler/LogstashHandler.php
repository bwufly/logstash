<?php
// +----------------------------------------------------------------------
// | LogstashHandler.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/16 14:43
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\Handler;

use Illuminate\Foundation\Exceptions\Handler;
use Exception;
use Ramsey\Uuid\Uuid;
use Wufly\Logstash;

class LogstashHandler extends Handler
{
    public function report(Exception $e)
    {
        if ($this->shouldntReport($e)) {
            return;
        }

        if (is_callable($reportCallable = [$e, 'report'])) {
            return $this->container->call($reportCallable);
        }

        Logstash::channel('handler')->error(
            $e->getMessage(),
            array_merge(
                $this->exceptionContext($e),
                $this->context(),
                ['exception' => $e],
                [
                    'path'        => request()->getRequestUri(),
                    'param'       => json_encode(request()->except(['token', 'password'])),
                    'request_id'  => Uuid::uuid4()->toString(),
                    'user_id'     => auth()->id(),
                    'system_name' => config('app.name'), // 系统名称
                ]
            )
        );
    }
}
