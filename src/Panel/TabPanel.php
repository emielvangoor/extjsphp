<?php

namespace Bonsa\Extphp\Panel;

class TabPanel extends Panel
{
    protected $xtype = 'tabpanel';

    /**
     * @param Panel[] $items
     */
    public function __construct($items = [])
    {
        foreach ($items as $item) {
            $this->add($item);
        }

        parent::__construct();
    }
}
