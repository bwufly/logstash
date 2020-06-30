<?php
/**
 * Created by PhpStorm.
 * User: wufly
 * Date: 2020/6/30 20:37
 */

namespace Test\Wufly;

use PHPUnit\Framework\TestCase;
use Wufly\Logstash;

class LogstashTest extends TestCase
{

    public function testChannel()
    {
        Logstash::channel('wufly')->alert('111');
        $this->assertTrue(true);
    }
}
