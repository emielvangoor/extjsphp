<?php

namespace EXB\Ui\Panel;

class TabPanel extends Panel
{
    protected $xtype = 'tabpanel';

    /**
     * @param string $title
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
