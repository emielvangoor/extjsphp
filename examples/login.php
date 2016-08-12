<?php

namespace Bonsa;

require __DIR__.'/../vendor/autoload.php';

use Bonsa\Extphp\Form\Field\Text;
use Bonsa\Extphp\Layout\Container\Center;
use Bonsa\Extphp\Panel\Panel;

class LoginPanel extends Panel
{
    /**
     * {@inheritdoc}
     */
    public function initComponent()
    {
        parent::initComponent();

        $this->setLayout(new Center);

        $this->add(new Panel([
            'viewModel' => [
                'title' => 'test'
            ],
            'bind' => [
                'title' => 'Login {title}',
            ],
            'border' => true,
            'height' => 200,
            'width' => 350,
            'items' => [new Text([
                'bind' => '{title}',
                'fieldLabel' => 'Username'
            ])],
        ]));
    }
}

echo json_encode(new LoginPanel);
