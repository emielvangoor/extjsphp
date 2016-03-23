<?php

namespace Bonsa\Extphp\Layout\Container;

class Center extends AbstractContainer
{
    protected $layout = 'center';

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize() {
        return $this->layout;
    }
}
