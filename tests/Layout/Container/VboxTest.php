<?php

namespace Bonsa\Extphp\Layout\Container;

use Bonsa\Extphp\Layout\Container\Vbox;

class VboxTest extends \PHPUnit_Framework_TestCase
{
    public function testAlignedAndPackedLayout()
    {
        $expected = [
            'type' => 'vbox',
            'pack' => 'start',
            'align' => 'stretch',
        ];

        $layout = new Vbox;
        $layout->setPack(Vbox::PACK_START);
        $layout->setAlign(Vbox::ALIGN_STRETCH);

        $this->assertEquals($expected, json_decode(json_encode($layout), true));
    }

    public function testConfigAlignedAndPacked()
    {
        $expected = [
            'align' => 'stretch',
            'type' => 'vbox',
            'pack' => 'start',
        ];

        $layout = new Vbox([
            'pack' => Vbox::PACK_START,
            'align' => Vbox::ALIGN_STRETCH,
        ]);

        $this->assertEquals($expected, json_decode(json_encode($layout), true));
    }
}
