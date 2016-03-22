<?php

namespace Bonsa\Extphp;

use Bonsa\Extphp\Layout\Container\Hbox;
use Bonsa\Extphp\Layout\Container\Vbox;
use Bonsa\Extphp\Panel\Panel;

class AbstractContainerTest extends \PHPUnit_Framework_TestCase
{
    public function testSetLayoutByConfig()
    {
        $expected = [
            'xtype' => 'panel',
            'layout' => [ 'type' => 'hbox' ]
        ];

        $panel = new Panel([
            'layout' => new Hbox
        ]);
        $output = json_encode($panel);

        $this->assertJson($output);
        $this->assertEquals(json_encode($expected), $output);
    }

    public function testSetOtherLayout()
    {
        $expected = [
            'xtype' => 'panel',
            'layout' => [ 'type' => 'hbox' ]
        ];

        $panel = new Panel([
            'layout' => new Vbox
        ]);
        $panel->setLayout(new Hbox);

        $output = json_encode($panel);

        $this->assertJson($output);
        $this->assertEquals(json_encode($expected), $output);
    }
}
