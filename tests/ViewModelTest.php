<?php

namespace Ui;

use Bonsa\Extphp\ViewModel;

class ViewModelTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyViewModel()
    {
        $this->assertEquals('""', json_encode(new ViewModel), "ViewModel should be empty encoded string when it contains no data");
    }

    public function testSetData() {
        $vm = new ViewModel;
        $vm->set('key1', 'value');

        $expected = [
            'data' => [
                'key1' => 'value',
            ],
        ];
        $output = json_encode($vm);

        $this->assertJson($output);
        $this->assertEquals(json_encode($expected), $output, "Should be able to set data");
    }
}
