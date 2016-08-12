<?php

require __DIR__.'/../vendor/autoload.php';

use Bonsa\Extphp\Layout\Container\Vbox;
use Bonsa\Extphp\Panel\Panel;

class InterfaceExample extends Panel
{
    /**
     * {@inheritdoc}
     */
    public function initComponent()
    {
        parent::initComponent();

        $this->setLayout(new Vbox([
            'align' => Vbox::ALIGN_STRETCH,
            'pack' => Vbox::PACK_START,
        ]));

        $this->add(new Panel(['title' => 'First panel', 'flex' => 1]));
        $this->add(new Panel(['title' => 'Second panel', 'flex' => 1]));
    }
}

echo json_encode(new InterfaceExample);
