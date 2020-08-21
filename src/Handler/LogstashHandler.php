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
        parent::report($e);

        Logstash::channel('handler')->error(
            $e->getMessage(),
            array_merge(
                $this->exceptionContext($e),
                $this->context(),
                ['exception' => $e]
            )
        );
    }
}
