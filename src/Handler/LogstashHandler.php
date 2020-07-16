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

        Logstash::error(
            $e->getMessage(),
            array_merge(
                $this->exceptionContext($e),
                $this->context(),
                ['exception' => $e]
            )
        );
    }
}
