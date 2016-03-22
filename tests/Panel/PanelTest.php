<?php

namespace Bonsa\Extphp\Panel;

class PanelTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyPanel()
    {
        $expected = ['xtype' => 'panel'];
        $panel = new Panel;

        $output = json_encode($panel);
        $this->assertJson($output);
        $this->assertEquals(json_encode($expected), $output);
    }

    public function testCollapseDirectionPanel()
    {
        $expected = ['xtype' => 'panel', 'collapseDirection' => 'left'];
        $panel = new Panel;
        $panel->setCollapseDirection(Panel::COLLAPSE_DIRECTION_LEFT);

        $output = json_encode($panel);
        $this->assertJson($output);
        $this->assertEquals(json_encode($expected), $output);
    }

    public function testTitlePanel()
    {
        $expected = ['xtype' => 'panel', 'title' => 'My Panel 1'];
        $panel = new Panel;
        $panel->setTitle('My Panel 1');

        $output = json_encode($panel);
        $this->assertJson($output);
        $this->assertEquals(json_encode($expected), $output);
    }

    public function testPanelConfigChilds()
    {
        $expected = [
            'xtype' => 'panel',
            'items' => [
                ['xtype' => 'panel', 'title' => '1'],
                ['xtype' => 'panel', 'title' => '2'],
            ]
        ];

        $panel = new Panel([
            'items' => [
                new Panel(['title' => '1']),
                new Panel(['title' => '2']),
            ]
        ]);

        $output = json_encode($panel);

        $this->assertJson($output);
        $this->assertEquals(json_encode($expected), $output);
    }

    public function testPanelWithAddedChilds()
    {
         $expected = [
            'xtype' => 'panel',
            'items' => [
                ['xtype' => 'panel', 'title' => '1'],
                ['xtype' => 'panel', 'title' => '2'],
            ]
        ];

        $panel = new Panel;
        $panel->add(new Panel(['title' => '1']));
        $panel->add(new Panel(['title' => '2']));

        $output = json_encode($panel);

        $this->assertJson($output);
        $this->assertEquals(json_encode($expected), $output);
    }

    public function testPanelWithMixedAddedChildsAndConfigChilds()
    {
          $expected = [
            'xtype' => 'panel',
            'items' => [
                ['xtype' => 'panel', 'title' => '1'],
                ['xtype' => 'panel', 'title' => '2'],
            ]
        ];

        $panel = new Panel([
            'items' => [new Panel(['title' => '1'])]
        ]);
        $panel->add(new Panel(['title' => '2']));

        $output = json_encode($panel);

        $this->assertJson($output);
        $this->assertEquals(json_encode($expected), $output);
    }
}