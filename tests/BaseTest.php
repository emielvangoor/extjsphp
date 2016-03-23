<?php

namespace Bonsa\Extphp;

use Bonsa\Extphp\Form\Field\Text;
use Bonsa\Extphp\Panel\Panel;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    function testSetProperty()
    {
        $panel = new Panel;

        // Non-bind property
        $panel->setProperty("cls", 'value1');

        // Properties should be be converted to have a lowercase first letter
        $panel->setProperty("CollapseDirection", 'value2');

        // Bind properties
        $panel->setProperty("title", 'stringy', Panel::PROPERTY_BINDABLE);

        $expected = [
            'xtype' => 'panel',
            'cls' => 'value1',
            'collapseDirection' => 'value2',
            'bind' => [
                'title' => 'stringy'
            ]
        ];

        $output = json_encode($panel);
        $this->assertEquals($expected, json_decode($output, true));
    }

    public function testBindConfig()
    {
        $expected = [
            'xtype' => 'panel',
            'bind' => [
                'title' => 'stringy'
            ]
        ];

        $panel = new Panel([
            'bind' => [
                'title' => 'stringy'
            ]
        ]);

        $this->assertEquals($expected, json_decode(json_encode($panel), true));
    }

    public function testBindCouldBeString()
    {
        $expected = [
            'xtype' => 'textfield',
            'bind' => "{title}",
        ];

        $panel = new Text([
            'bind' => "{title}"
        ]);

        $this->assertEquals($expected, json_decode(json_encode($panel), true));
    }

    /**
     * @expectedException \Exception
     */
    public function testShouldNotAbleToSetUnknownProperty()
    {
        $panel = new Panel;
        $panel->setProperty('unkown', false);
    }
}
