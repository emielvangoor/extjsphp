<?php

namespace Bonsa\Extphp\Layout\Container;

class CenterTest extends \PHPUnit_Framework_TestCase
{
    public function testLayout()
    {
        $expected = 'center';
        $layout = new Center;

        $this->assertEquals(json_encode($expected), json_encode($layout));
    }
}
