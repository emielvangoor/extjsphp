<?php

namespace Bonsa\Extphp;

use Bonsa\Extphp\Panel\Panel;

class PropertyTraitTest extends \PHPUnit_Framework_TestCase
{
    function testSetProperty()
    {
        $panel = new Panel;

        // Non-bind property
        $panel->setProperty("cls", 'value1');

        // Properties should be be converted to have a lowercase first letter
        $panel->setProperty("CollapseDirection", 'value2');

        // Bind properties
        $panel->setProperty("title", 'stringy', true);

        $expected = [
            'xtype' => 'panel',
            'cls' => 'value1',
            'collapseDirection' => 'value2',
            'bind' => [
                'title' => 'stringy'
            ]
        ];

        $output = json_encode($panel);

        $this->assertJson($output);
        $this->assertEquals(json_encode($expected), $output);
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
